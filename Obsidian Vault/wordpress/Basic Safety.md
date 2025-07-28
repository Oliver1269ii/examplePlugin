## Protecting against direct folder access
Having a index.php file with the contents listed below, can prevent against direct folder access. Without it, breachers could get sent to a file structure tree and be able to navigate from there.
#indexContent 
```
<?php
// Silence is golden.
```
## Protecting against direct file access
Protecting against direct file access is important to retain security and application flow. 
Adding this simple line of logic, eliminates direct file access.
`defined( 'ABSPATH' ) or die();`