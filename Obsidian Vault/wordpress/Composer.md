
## Initialize
`composer init`
Creates the basic setup and structure for composter

## Dump autoload
`composer dump-autoload`
Dumps and recreates the composer files. Should be used after changing namespace names and the like.

## Load vendor autoload
```
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}
```
Use a the top of your main file to accept composer namespaces

## Declaring namespaces
`namespace Inc\file\path`
Declares where in the file structure the current file is found 

## Referring to namespaces
`use Inc\declared\namespace`
Refers to a namespace. Replaces most usecases of `require_once`

## Calling classes and their functions
``` 
use Inc\declared\namespace
className::functionName 
```
The most intuitive way of calling and referring to classes and their functions, similar to #Static found in [[Calling class methods]]

