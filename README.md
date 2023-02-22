News4ward
=========

Enhanced news/blog extension for the Contao CMS.

Low maintained fork of the [PSI News4Ward](https://github.com/psi-4ward/news4ward) modules

Features
--------
* ContentElements like the standard articles
* [Tagcloud](https://github.com/iMi-digital/news4ward_tags)
* [Comments](https://github.com/iMi-digital/news4ward_comments)
* [Categories](https://github.com/iMi-digital/news4ward_categories)
* [Multiple-Categories](https://github.com/iMi-digital/news4ward_multicategories)
* [Related-Articles](https://github.com/iMi-digital/news4ward_related)
* [Archive-Menu](https://github.com/iMi-digital/news4ward_archiveMenu)
* [Newsletter](https://github.com/iMi-digital/news4ward_newsletter)
* [Mostread](https://github.com/iMi-digital/news4ward_mostread)
* [TitleSearch](https://github.com/iMi-digital/news4ward_titleSearch)
* and of course some more improvements compared to core-news module

Installation
------------

### Attention
**DO NOT** use the Contao Repository, it holds very old versions of news4ward and its componentes!
Use the [Contao Compoers](https://contao.org/de/extension-list/view/composer.html) to install news4ward with all dependencies.

Make a Backup of your Installation! If you use news4ward without GlobalContentelements
contao deletes all your contentelements!

### Required extenion
First install these extensions:
* [tagsWidget](https://github.com/iMi-digital/tagsWidget)
* [MultiColumnWizard](https://contao.org/de/extension-list/view/MultiColumnWizard.de.html)

### news4ward

#### Installation

We recommend to install via `composer require imi/news4ward` or via the Contao Manager.

* Download or clone the news4ward to `system/modules`
* and optionally news4ward_tags, news4ward_comments and news4ward_categories if you like
* update the database

#### Usage

* create modules, news4ward-archives and so on ... :)

### Copyright
* License: http://www.gnu.org/licenses/lgpl-3.0.html LGPL <br>
* Author: [4ward.media](http://www.4wardmedia.de)
* Maintainer: [iMi digital GmbH](https://www.imi-digital.de/)

Much thanks to the original author for creating these modules.
Much thanks to to Jozef Dvorsky for providing the english translation!

### About iMi digital

[iMi digital GmbH](http://www.imi.de/) offers Contao related open source modules. If you are confronted with any bugs, you may want to open an issue here.

In need of support or an implementation of a modul in an existing system, [free to contact us](mailto:a.menk@iMi.de). In this case, we will provide full service support for a fee.

Of course we provide development of closed-source moduls as well.
