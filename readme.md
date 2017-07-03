# Media Link Example Module

A sample module to be used as an example on how to link media with your own entities.

## Installation

### Module Download

Using AsgardCMS's module download command:

``` bash
php artisan asgard:download:module asgardcms/Media-link-example --migrations
```

This will download the module and run its migrations.

**Note: Don't forget to give yourself the required permissions before you can view the backend entries.**

Once you have the required permission, you can create new authors, with a name and a profile picture.

## Delete module

Once you're done experimenting, you can delete the module using the following command:

``` bash
php artisan asgard:delete:module MediaLinkExample --migrations
```
