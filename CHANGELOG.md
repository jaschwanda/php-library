# Change Log #

PHP file library changes are logged here using <a href="http://semver.org/">Semantic Versioning</a>.

## 1.1.3 (2018-01-18) ##
* Changed the parent::mysqli() call to parent::__construct() in the USI_Dbs class constructor.

## 1.1.2 (2017-12-31) ##
* Added an escape flag to the print_r() method to supress html comment tags when already inside html comment tags.
* Removed shutdown handler as it was rarely used and can be added by the application if needed.

## 1.1.1 (2017-11-14) ##
* Added "@" to suppress error message if the USI_Dbs_Stmt::__desctuct() closes a bogus query.

## 1.1.0 (2017-11-12) ##
* Reworked code.
* Added a shutdown handler that logs the messages via a user supplied message handler.

## 1.0.0 (2017-10-30) ##
* Initial release.

