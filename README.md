HTML Snippets for Elgg
======================
![Elgg 2.3](https://img.shields.io/badge/Elgg-2.3.x-orange.svg?style=flat-square)

Reusable and editable snippets with variable interpolation

## Features

Using plugin settings to alter large chunks of HTML is repetitive and not very efficient: 
you have to update plugins settings, remember in which plugin a setting lives, figure out
 how to populate default values, implement weird mechanics to interpolate variables etc. 
 
 This plugin makes it easy, just create a snippets in your views and will be available
 for editing via admin interface. Snippets can then be injected into your views with 
 `elgg_snippet()`.
 
 ## Usage
 
 Once the plugin is enabled, snippets can be edited under Admin > Appearance > HTML Snippets.
 
 Create a default snippet as a .twig view anywhere in `views/default/snippets/`:
 
 ```twig
 // my-plugin/views/default/snippets/page/footer.twig
 <div class="footer">
   <a class="{{ normalizeUrl('/contact') }}">Contact Us</a>
 </div>
 ```
 
 Render a snippet where it belongs:
 
 ```php
 // my-plugin/views/default/somewhere.php
 echo elgg_snippet('page/footer');
 ```
 
 You can provide the title and the description of the snippet using translations:
 
 ```php
 // languages/en.php
 return [
    'snippet:page/footer' => 'Page Footer Template',
    'snippet:page/footer:help' => 'Displayed on all pages in the footer area',
 ];
 ```
 
 ## Storage
 
 Snippet overrides are stored in the dataroot, so be sure to copy them over if migrating your site.
 You can also reset to default template, by deleting a corresponding snippet from the dataroot.