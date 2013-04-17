# ACF Repeater Shortcodes

This Wordpress Module adds shortcode support for the acf-repeater (paid) add-on for [Advanced Custom
Fields](http://www.advancedcustomfields.com/)

It adds three shortcodes for using repeaters:

## `acf_repeater`

`[acf_repeater field="<fieldname>" (post_id="<post_id>" separator="<separator>")]..\[/acf_repeater]`

Renders contents for each item in repeater list. Optional separator can be placed between each of
the items. Optional `post_id` parameter defaults to the current post.

## `acf_sub_field`

`[acf_sub_field field="<subfieldname>" (autop="true")]`

Renders a subfield of the surrounding `acf_repeater` shortcode. Optional `autop` applies `wpautop` to the
contents of the subfield.

## `acf_sub_repeater`

`[acf_sub_repeater field="<fieldname>" (separator="<separator>")]..[/acf_sub_repeater]`

Renders a repeater which is a subfield of another repeater. Necessary as I do not believe the
shortcode parser in WP can have a shortcode embedded within a shortcode of the same name.
