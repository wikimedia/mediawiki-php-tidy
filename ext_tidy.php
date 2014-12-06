<?hh

/**
 * Repair a string using an optionally provided configuration file
 *
 * @param string $data - The data to be repaired.
 * @param string $config - Name of a configuration file.
 * @param string $encoding - The encoding parameter sets the encoding for
 *   input/output documents. The possible values for encoding are: ascii,
 *   latin0, latin1, raw, utf8, iso2022, mac, win1252, ibm858, utf16, utf16le,
 *   utf16be, big5, and shiftjis.
 *
 * @return string - Returns a textual description of the contents of the
 *   filename argument, or FALSE if an error occurred.
 */
<<__Native>>
function tidy_repair_string(string $data,
							?string $config = NULL,
							?string $encoding = NULL): string;
