# JSON5 PHP Parser
Converts JSON5 to PHP object.

This is a highly experimental, and incomplete package for parsing JSON5 in PHP.

The script currently removes JSON5 features that are not supported by PHP, and converts them to their PHP equivalent.

## Supported Features
| Feature                                                           | Supported         | Version |
|-------------------------------------------------------------------|-------------------|---------|
| Standard JSON5                                                    | :white_check_mark:| 0.1     |
| [COMMENTS] Single-line                                            | :white_check_mark:| 0.1     |
| [COMMENTS] Multi-line                                             | :white_check_mark:| 0.1     |
| [NUMBERS] Hexadecimal                                             | :x:               | -       |
| [NUMBERS] Leading / Trailing Decimal Points                       | :white_check_mark:| 0.2     |
| [NUMBERS] IEEE 754 Positive/negative infinity                     | :x:               | -       |
| [NUMBERS] NaN                                                     | :white_check_mark:| 0.2     |
| [NUMBERS] Begin with an explicit plus sign                        | :white_check_mark:| 0.2     |
| [WHITESPACE] Additional white space characters are allowed        | :x:               | -       |
| [STRINGS] May be single quoted                                    | :x:               | -       |
| [STRINGS] May span multiple lines by escaping new line characters | :x:               | -       |
| [STRINGS] May include character escapes                           | :x:               | -       |
| [ARRAYS] May have a single trailing comma                         | :x:               | -       |
| [OBJECTS] Object keys may be an ECMAScript 5.1 IdentifierName.    | :x:               | -       |
| [OBJECTS] Objects may have a single trailing comma.               | :x:               | -       |

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
