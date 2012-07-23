Yet another HTML5 Boilerplate Wordpress theme - with a twist
============================================================
##sengeezer's fork

This is a very stripped down wordpress theme that hopes to fill in a niche that, from our experience, hasn't been fully realized.  If we're going to future-proof our wordpress themes with HTML5 and CSS3 let's not stop at just integrating Paul Irish and Divya Manian's Boilerplate or marking up with all the new HTML5 tags, let's use something like SASS/SCSS, Compass, and the Susy grid framework to facilitate easier and faster stylesheet authoring.  The goal of this experiment is to pull in the best open source tools to help us work with wordpress theming.

What do I need to get started with this theme?
==============================================

* Compass
* The Susy grid framework

So as to not have to update this section all the time, please use Google to get the above if you don't already have them.

For unobtrusive SASS compilation, I recommend LiveReload.

Anatomy of this theme
=====================

* As mentioned above, the html5 boilerplate project (https://github.com/paulirish/html5-boilerplate) serves as the basis for the markup and stylesheet as much as possible.  The one exception that stands out is that javascript is still included within `<head/>` by default instead of just before `</body>`.
* The latest versions of Modernizr, DD_belatedPNG and jQuery.
* CSS has been split up into partials using the SCSS formatting method instead of traditional SASS. All partials can be found in html5_boilerplate/sass/partials.
* In addition to base font variables, style.scss contains grid-related variables that will drive how we layout the theme.  Currently the default is a 16 column grid (for a 960px wide grid), but you will also find a 12 column grid commented out above.
* functions.php does some light housekeeping as well as additional options under _Appearance > More Theme Options_ for turning on/off and setting up multiple sidebars (left, right, footer).

Further Reading
===============

* The HTML5 Boilerplate Project.  http://html5boilerplate.com
* Sass. http://sass-lang.com/, http://sass-lang.com/tutorial.html
* Compass. http://beta.compass-style.org/
* Susy. http://susy.oddbird.net/

Many Thanks To
==============

[Paul Irish](http://paulirish.com/), [Divya Manian](http://nimbupani.com/), [Faruk Ates](http://farukat.es/), [Chris Eppstein](http://compass-style.org), [the OddBirds - Carl Meyer, Eric Meyer and Jonny Gerig Meyer](http://susy.oddbird.net/) - thank you all for your hard work!

Contact
=======

First, these guys:

Joel Oliveira [@jayroh](http://twitter.com/jayroh) and Mike Susz  [@mikesusz](http://twitter.com/mikesusz)


And perhaps me, sengeezer, later on. ;)