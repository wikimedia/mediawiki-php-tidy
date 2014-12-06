/*
   +----------------------------------------------------------------------+
   | Tidy for HHVM                                                        |
   +----------------------------------------------------------------------+
   | Copyright (c) 1997-2010 The PHP Group                                |
   | Copyright (c) 2014 Ori Livneh <ori@wikimedia.org>                    |
   +----------------------------------------------------------------------+
   | This source file is subject to version 3.01 of the PHP license,      |
   | that is bundled with this package in the file LICENSE, and is        |
   | available through the world-wide-web at the following url:           |
   | http://www.php.net/license/3_01.txt                                  |
   | If you did not receive a copy of the PHP license and are unable to   |
   | obtain it through the world-wide-web, please send a note to          |
   | license@php.net so we can mail you a copy immediately.               |
   +----------------------------------------------------------------------+
*/
#include "hphp/runtime/base/base-includes.h"
#include <tidy.h>
#include <buffio.h>

namespace HPHP {

static String HHVM_FUNCTION(tidy_repair_string, const String& data,
                                                const Variant& config,
                                                const Variant& encoding) {
    TidyDoc doc = tidyCreate();
    tidyOptSetBool(doc, TidyForceOutput, yes);
    tidyOptSetBool(doc, TidyMark, no);
    String ret;

    TidyBuffer errbuf;
    tidyBufInit(&errbuf);

    if (tidySetErrorBuffer(doc, &errbuf) != 0) {
        tidyBufFree(&errbuf);
        tidyRelease(doc);
        raise_error("Could not set Tidy error buffer");
    }

    if (config.isString()) {
        String sconfig = config.toString();
        if (tidyLoadConfigEnc(doc, sconfig.data(), "utf8") < 0) {
            raise_error("Unable to load Tidy configuration file at '%s'.", sconfig.data());
            not_reached();
        }
    }

    if (encoding.isString()) {
        String sencoding = encoding.toString();
        if (tidySetCharEncoding(doc, sencoding.data()) < 0) {
            raise_error("Could not set encoding '%s'", sencoding.data());
            not_reached();
        }
    }

    if (!data.empty()) {
        TidyBuffer buf;
        tidyBufInit(&buf);
        tidyBufAttach(&buf, (byte *)data.data(), data.length());

        if (tidyParseBuffer(doc, &buf) < 0) {
            raise_warning("%s", errbuf.bp);
        } else {
            if (tidyCleanAndRepair(doc) >= 0) {
                TidyBuffer output;
                tidyBufInit(&output);
                tidySaveBuffer(doc, &output);
                ret = String(reinterpret_cast<char*>(output.bp), CopyString);
                tidyBufFree(&output);
            }
        }
        tidyBufFree(&errbuf);
    }

    tidyRelease(doc);
    return ret;
}

static class TidyExtension : public Extension {
 public:
  TidyExtension() : Extension("tidy") {}
  virtual void moduleInit() {
    HHVM_FE(tidy_repair_string);
    loadSystemlib();
    tidySetMallocCall(smart_malloc);
    tidySetReallocCall(smart_realloc);
    tidySetFreeCall(smart_free);
  }
} s_tidy_extension;

HHVM_GET_MODULE(tidy)

} // namespace HPHP
