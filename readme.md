# Discourse Topic Integration
Contributors: Matthieu Lapeyre, hlashbrooke
Tags: discourse, wordpress, plugin
Requires at least: 3.9
Tested up to: 4.0
Stable tag: 0.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Embed any discourse topic in your wordpress pages.

## Description

This plugin allows you embedding the first post of any [Discourse forum](www.discourse.org) topic.

Once activated, it provides a simple wordpress shortcode:
```
[discourse topic_id="xxx" type="subject/full/reverse-full/author-info"]
```

which generates simple HTML code:

```
<h1> {Title} </h1>
<h2> {Author} <h2>

{content}

<button> {Link to the topic} </button>
```

## Installation

Installing "Discourse Topic Integration" can be done either by using the following steps:

1. [Download](archive/master.zip) this plugin
2. Upload the ZIP file through the 'Plugins > Add New > Upload' screen in your WordPress dashboard
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Go to your admin panel `Settings > Discourse Topic Integration`
5. Specify your Discourse url in the `Discourse base url` field
6. Get the ID in topic url you want to embed
6. Create a new page and put this shortcode `[discourse topic_id='ID']`



## Changelog

### 0.4.1
* add author-info template

### 0.3
* Center images by default
* Add templates
* add new option to embed full topic in order or reverse order

### 0.2
* Add support for custom CSS

### 0.1
* 2015-06-19
* Initial release
