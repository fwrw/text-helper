
# Text Helper

Text Helper is a PHP Library, that helps with text/string manipulation.

## Installation

To install, run this command inside your project directory in your terminal:

```bash
    composer require fwrw/text-helper
```
## Usage/Examples

### To remove excessive whitespaces:
```bash
  TextHelper::normalizeSpaces($text);
```
It will return the $text variable without them.


### To cut a text:
```bash
  TextHelper::cut($text, $limit);
```
It will cut the variable $text in the limit passed by param $limit.
you can also put a final string at the end:

```bash
  TextHelper::cut($text, $limit, $end);
```
In that case, the text will be cuted, and have a string (passed by param) at the end, example:
```bash
input
  TextHelper::cut($text, 20, "...");
```
```bash
out
  Lorem ipsum dolor am...
```
In order to avoid a word from separating in the middle, rather cut from the last whitespace by passing 'true' after the $end variable, by param:
```bash
input
  TextHelper::cut($text, 20, "...", true);
```
```bash
out
  Lorem ipsum dolor...
```
### To remove accents:
```bash
  TextHelper::stripAccents($text);
```
will return the $text variable cleaned, without any accent. Example:
```bash
input
  TextHelper::stripAccents("O dia está lindo");
```
```bash
out
  O dia esta lindo
```
### To remove special characters:
```bash
  TextHelper::clear($text);
```
will return the variable $text withour any special characters. You can also clear numbers and accents, just passin 'true' values by param:
```bash
input
  TextHelper::clear($text, $numbers, $accent);
```
in that case, the $text variable is going to be reformulated without any number, accent, or special character:
```bash
input
  TextHelper::clear("Bom dia, você está linda hoje!!1", true, true);
```
```bash
out
  Bom dia voce esta linda hoje
```
#### There are some other methods that are self-intuitive, feel free to read the code. :)

## Author

- [@fwrw](https://www.github.com/fwrw)

