### Mile
A simple library for file manipulation in php.

Mile is super duper WIP.

It's purpose is to let you do basic file operations with minimal worry.

#### Example
Let's say you need to create or overwrite a static file in an atomic operation (ie. Other processes need to be safe to open the file without accidentally doing so in the middle of the change). You'd do this like so:

`mile = new \themallen\mile\Mile()->put('some/path','some data');`

#### Functions
* put - `put('a/path/to/something','some blob of text');`
Mile writes to a temporary file and then uses rename as it is an atomic operation. If rename fails (on some windows hosts it will), it falls back to copy->unlink.
