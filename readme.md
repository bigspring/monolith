monolith
========

a lightweight WordPress theme powered by Twitter Bootstrap, built for developers. Created by [BigSpring](http://www.bigspring.co.uk).

about
-----

Monolith is a starter theme for WordPress. It's specifically designed to be a lightweight and lean as possible, to allow developers to create their own specialised themes with as little overhead as possible, using the power of Twitter Bootstrap and a few custom shortcodes and functions to help you along the way.

Anything that is too project-specific or heavy has been stripped out, and can be easily implemented on a case by case basis as needed.

We started this project as our own internal starter theme at BigSpring, because most of the other theme frameworks out there either did too much or not enough for our needs. So we built our own.

The aim is for Monolith to be constantly growing – changing and developing as trends and web frameworks change, always giving us a good solid starting point from which to create our web projects.

Monolith is released under the MIT Open Source license, so you're welcome to use it on any free or commercial projects of your own.

Be sure to read [the documentation](https://github.com/bigspring/monolith/wiki). Disclaimer: docs are a bit out of date but we're working on that!
		
Much love,

Team BigSpring

Follow us on Twitter:
[@bigspringweb](http://twitter.com/bigspringweb), [@juliotaylor](http://twitter.com/juliotaylor), [@simonBigSpring](http://twitter.com/simonbigspring), [@tulipdom](http://twitter.com/tulipdom)

p.s. monolith is also available as part of [lunchbox](https://github.com/bigspring/lunchbox), a quickstart bash script that installs WordPress, monolith and an arsenal of handy plugins in a few seconds.


dependency management
------------------

Monolith utilises Bower and Grunt.

1. Ensure that the following npm packages are installed globally:

	bower, grunt-cli

2. Update bower-fetched dependencies

3. Run this command from the project root to fetch and install local node packages as defined in package.json:

	$ npm install

4. Finally, run grunt with no args from the project root:

	$ grunt


changelog
-----

* 1.4.1 – added grunt compiler for less files
* 1.4.0 – GRUNTIFY ALL THE TINGS! (almost) – refactored posts, index and page templates to include full width headers, implemented basic grunt dependency management mostly for js (more to follow)
* 1.3.0 – upated to Bootstrap 3.1; added bower dependencies for Bootstrap & Font Awesome via base.less
* 1.2.0 – updated fontawesome to 4.0.3, removed front-page template, added new kitchen sink shortcode 
* 1.1.0 – implement new shortcodes (panel, divider), restructured header, improved search support, 
* 1.0.3 – added media queries, improved comments in custom.less
* 1.0.2 – updated Bootstrap to 3.0 stable, addressed some minor markup bugs
* 1.0.1 – minor amend to sidebar semantic classes
* 1.0.0 – hellow wembley stadium!