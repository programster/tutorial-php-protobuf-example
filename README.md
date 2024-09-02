PHP Protobuf Example
====================
A minimal example demonstrating the use of a Slim4 server responding to a request using protocol buffers (protobuf). The purpose
of this codebase was just to prove the concept, and to have the smallest possible solution I was comfortable with to prove that
protobufs could be a viable solution to RESTful APIs that I often develop using the Slim framework. The entire PHP codebase (that
was non-generated from the proto file, or from packages), is a single index.php file less than 50 lines long.


## Getting Started
In order to use this codebase, you will need to have the protobuf compiler, for it to generate the types from the .proto file in the codebase.

On Debian/Ubuntu, you will probably be able to install this by running:

```bash
sudo apt install protobuf-compiler
```

Once you have the compiler installed, use the following command from within the `src/` directory to generate the types:

```bash
protoc \
  --php_out=. \
  MyApplication.proto
```

Then you can run the code using the built-in webserver with:

```bash
php -S localhost:8080 index.php
```

When you navigate to localhost:8080 in your browser, you should see the raw output of the protobuf message. You can flip the switch inside `src/index.php` to change it to return the output in normal JSON form to demonstrate the difference.
