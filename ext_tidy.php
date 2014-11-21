<?hh

<<__NativeData("ZendCompat")>> class tidy {
	var $errorBuffer;

	<<__Native("ZendCompat")>> function __construct(mixed $filename, 
		mixed $config = null, mixed $encoding = null, mixed $use_include_path = null): void;
	<<__Native("ZendCompat")>> function body(): mixed;
	<<__Native("ZendCompat")>> function cleanRepair(): mixed;
	<<__Native("ZendCompat")>> function diagnose(): mixed;
	<<__Native("ZendCompat")>> function getConfig(): mixed;
	<<__Native("ZendCompat")>> function getHtmlVer(): mixed;
	<<__Native("ZendCompat")>> function getOpt(mixed $option): mixed;
	<<__Native("ZendCompat")>> function getRelease(): mixed;
	<<__Native("ZendCompat")>> function getStatus(): mixed;
	<<__Native("ZendCompat")>> function head(): mixed;
	<<__Native("ZendCompat")>> function isXhtml(): mixed;
	<<__Native("ZendCompat")>> function isXml(): mixed;
	<<__Native("ZendCompat")>> function parseFile(mixed $filename,
		mixed $config = null, mixed $encoding = null, mixed $use_include_path = null): mixed;
	<<__Native("ZendCompat")>> function parseString(mixed $input,
		mixed $config = null, mixed $encoding = null): mixed;
	<<__Native("ZendCompat")>> function repairFile(mixed $filename,
		mixed $config = null, mixed $encoding = null, mixed $use_include_path = false): mixed;
	<<__Native("ZendCompat")>> function repairString(string $data,
		mixed $config = null, mixed $encoding = null): mixed;
	<<__Native("ZendCompat")>> function root(): mixed;
	<<__Native("ZendCompat")>> function getOptDoc(mixed $resource, mixed $optname): mixed;
}

<<__NativeData("ZendCompat")>> class tidyNode {
	var $value;
	var $name;
	var $type;
	var $line;
	var $column;
	var $proprietary;
	var $id;
	var $attribute;
	var $child;

	<<__Native("ZendCompat")>> private function __construct(): void;
	<<__Native("ZendCompat")>> function getParent(): mixed;
	<<__Native("ZendCompat")>> function hasChildren(): mixed;
	<<__Native("ZendCompat")>> function hasSiblings(): mixed;
	<<__Native("ZendCompat")>> function isAsp(): mixed;
	<<__Native("ZendCompat")>> function isComment(): mixed;
	<<__Native("ZendCompat")>> function isHtml(): mixed;
	<<__Native("ZendCompat")>> function isJste(): mixed;
	<<__Native("ZendCompat")>> function isPhp(): mixed;
	<<__Native("ZendCompat")>> function isText(): mixed;
}

<<__Native("ZendCompat")>> function tidy_access_count(mixed $object): mixed;
<<__Native("ZendCompat")>> function tidy_config_count(mixed $object): mixed;
<<__Native("ZendCompat")>> function tidy_error_count(mixed $object): mixed;
<<__Native("ZendCompat")>> function tidy_get_output(mixed $object): mixed;
<<__Native("ZendCompat")>> function tidy_warning_count(mixed $object): mixed;

<<__Native("ZendCompat")>> function tidy_clean_repair(): mixed;
<<__Native("ZendCompat")>> function tidy_diagnose(): mixed;
<<__Native("ZendCompat")>> function tidy_get_body(mixed $object): mixed;
<<__Native("ZendCompat")>> function tidy_get_config(): mixed;
<<__Native("ZendCompat")>> function tidy_get_error_buffer(): mixed;
<<__Native("ZendCompat")>> function tidy_get_head(): mixed;
<<__Native("ZendCompat")>> function tidy_get_html(): mixed;
<<__Native("ZendCompat")>> function tidy_get_html_ver(): mixed;
<<__Native("ZendCompat")>> function tidy_get_release(): mixed;
<<__Native("ZendCompat")>> function tidy_get_root(): mixed;
<<__Native("ZendCompat")>> function tidy_get_status(): mixed;
<<__Native("ZendCompat")>> function tidy_getopt(mixed $option): mixed;
<<__Native("ZendCompat")>> function tidy_is_xhtml(): mixed;
<<__Native("ZendCompat")>> function tidy_is_xml(): mixed;
<<__Native("ZendCompat")>> function tidy_parse_file(mixed $filename,
		mixed $config = null, mixed $encoding = null, mixed $use_include_path = null): mixed;
<<__Native("ZendCompat")>> function tidy_parse_string(mixed $input,
		mixed $config = null, mixed $encoding = null): mixed;
<<__Native("ZendCompat")>> function tidy_repair_file(mixed $filename,
		mixed $config = null, mixed $encoding = null, mixed $use_include_path = false): mixed;
<<__Native("ZendCompat")>> function tidy_repair_string(string $data,
		mixed $config = null, mixed $encoding = null): mixed;
<<__Native("ZendCompat")>> function tidy_get_opt_doc(mixed $resource, mixed $optname): mixed;
