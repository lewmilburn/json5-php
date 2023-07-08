# JSON5 PHP Parser
Allows PHP to read JSON5 files by converting the JSON5 into standard JSON.

This is a highly experimental, and incomplete package for parsing JSON5 in PHP.

The script can not currently write JSON5 files, and any files read by the script can't be converted back to JSON5 by the script.

## Known issues
https://github.com/lewmilburn/json5-php/issues

## Supported Features
| Feature                                                           | Supported         | Version |
|-------------------------------------------------------------------|-------------------|---------|
| Standard JSON5                                                    | :white_check_mark:| 0.1     |
| [COMMENTS] Single-line                                            | :white_check_mark:| 0.1     |
| [COMMENTS] Multi-line                                             | :white_check_mark:| 0.1     |
| [NUMBERS] Hexadecimal                                             | :white_check_mark:| 0.3     |
| [NUMBERS] Leading / Trailing Decimal Points                       | :white_check_mark:| 0.2     |
| [NUMBERS] IEEE 754 Positive/negative infinity                     | :white_check_mark:| 0.3     |
| [NUMBERS] NaN                                                     | :white_check_mark:| 0.2     |
| [NUMBERS] Begin with an explicit plus sign                        | :white_check_mark:| 0.2     |
| [WHITESPACE] Additional white space characters are allowed        | :white_check_mark:| 0.3     |
| [STRINGS] May be single quoted                                    | :x:               | -       |
| [STRINGS] May span multiple lines by escaping new line characters | :x:               | -       |
| [STRINGS] May include character escapes                           | :x:               | -       |
| [ARRAYS] May have a single trailing comma                         | :white_check_mark:| 0.3     |
| [OBJECTS] Object keys may be an ECMAScript 5.1 IdentifierName.    | :x:               | -       |
| [OBJECTS] Objects may have a single trailing comma.               | :white_check_mark:| 0.3     |

## Example usage
```
<?php

require_once '/JSON5.php';

$JSON5 = new JSON5();
$ParsedJSON5 = $JSON5->Parse(file_get_contents('/data.json5'));
```

## License
JSON5 License: https://json5.org/LICENSE.md

JSON5 PHP Parser License: Apache 2.0 - See License.md
