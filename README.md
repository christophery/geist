# Geist

Geist is a personal blogging theme for WordPress. This theme is a port of [Casper](https://github.com/TryGhost/Casper) the default theme for the [Ghost](https://ghost.org/) blogging platform.

Feel free to [let me know](http://www.twitter.com/cmyee) if you use Geist in one of your websites.

[View Demo](https://chrisyee.ca/) | [Download Theme](https://github.com/christophery/geist/releases)

![Geist Screenshot](screenshot.png?raw=true)

## Features

- [Gutenberg Editor](https://wordpress.org/gutenberg/) Support
- Search
- Comments
- Customizer
- Social Profiles
- Responsive Design
- Infinite Scroll ([with Jetpack](https://jetpack.com/features/design/infinite-scroll/))
- Dark Mode

## Requirements

- [WordPress](http://wordpress.org/)

## Install

1. In your admin panel, go to **Appearance** > **Themes** and click the **Add New** button.
2. Click **Upload Theme** and **Choose File**, then select the theme's .zip file. Click **Install Now**.
3. Click **Activate** to use your new theme right away.

## Dark Mode

Dark mode is not enabled by default. To enable this feature go to **Appearance** > **Customize** > **Dark Mode**.

### Light
This will display the theme in light mode for everyone.

### Dark (auto)
This will automatically adjust the appearance based on the users OS appearance/color preference.

## Editing Geist
The recommended way to edit the theme is to [create a child theme](https://developer.wordpress.org/themes/advanced-topics/child-themes/).

This will ensure that none of your changes will be lost when you update the theme.

## Development
The CSS and JS files are compiled and minified using Gulp. You'll need [Node](https://nodejs.org/), [Yarn](https://yarnpkg.com/) and [Gulp](https://gulpjs.com/) installed globally.

**From the theme's root directory run:**

```
$ yarn install
$ yarn dev
```

Now you can edit files in `/css/` and `/js/`, which will be compiled to `/built/` automatically.

The **zip** Gulp task packages the theme files into `dist/geist.zip`, which you can then upload to your WordPress site.

```
$ yarn zip
```

## SVG Icons
Geist uses inline SVG icons, included. You can find all icons inside `/template-parts/icons`. 

To use an icon just use the [get_template_part()](https://developer.wordpress.org/reference/functions/get_template_part/) function:

```
<?php get_template_part('template-parts/icons/website'); ?>
```

## Third-party resources:

Casper, Copyright (c) 2013-2019 [Ghost Foundation](https://ghost.org/)  
**License:** [MIT license](https://github.com/TryGhost/Casper/blob/master/LICENSE).  
**Source:** [https://github.com/TryGhost/Casper](https://github.com/TryGhost/Casper)  

_s, Copyright 2015-2018 [Automattic, Inc.](https://automattic.com/)  
**License:** [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)  
**Source:** [https://github.com/Automattic/_s/](https://github.com/Automattic/_s/)  

FitVids, Copyright 2013 [Chris Coyier](https://chriscoyier.net/) and [Dave Rupert](https://daverupert.com/)  
**License:** [WTFPL](http://www.wtfpl.net/)  
**Source:** [https://github.com/davatron5000/FitVids.js](https://github.com/davatron5000/FitVids.js)  

## License
Geist, Copyright (c) 2021 [Chris Yee](https://chrisyee.ca) - Released under the [GPL v2.0 license](https://www.gnu.org/licenses/gpl-2.0.html).
