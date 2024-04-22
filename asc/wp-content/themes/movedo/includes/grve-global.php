<?php

/*
*	Global Parameter and functions
*
* 	@version	1.0
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

$movedo_grve_social_list = array(
	'twitter' => 'Twitter',
	'facebook' => 'Facebook',
	'instagram' => 'Instagram',
	'linkedin' => 'LinkedIn',
	'tumblr' => 'Tumblr',
	'pinterest' => 'Pinterest',
	'github' => 'Github',
	'dribbble' => 'Dribbble',
	'reddit' => 'reddit',
	'flickr' => 'Flickr',
	'skype' => 'Skype',
	'youtube' => 'YouTube',
	'vimeo' => 'Vimeo',
	'soundcloud' => 'SoundCloud',
	'wechat' => 'WeChat',
	'weibo' => 'Weibo',
	'renren' => 'Renren',
	'qq' => 'QQ',
	'xing' => 'XING',
	'rss' => 'RSS',
	'vk' => 'VK',
	'behance' => 'Behance',
	'foursquare' => 'Foursquare',
	'steam' => 'Steam',
	'twitch' => 'Twitch',
	'houzz' => 'Houzz',
	'yelp' => 'Yelp',
	'snapchat' => 'Snapchat',
	'medium' => 'Medium',
	'spotify' => 'Spotify',
	'whatsapp' => 'WhatsApp',
	'telegram' => 'Telegram',
	'mixcloud' => 'Mixcloud',
	'discord' => 'Discord',
	'tiktok' => 'TikTok',
	'patreon' => 'Patreon',
);

$movedo_grve_social_list_extended = array (
	'twitter' => array(
		'title' => 'X',
		'url' => 'twitter_url',
		'id' => 'twitter',
		'class' => 'fab fa-x-twitter',
	),
	'facebook' => array(
		'title' => 'Facebook',
		'url' => 'facebook_url',
		'id' => 'facebook',
		'class' => 'fab fa-facebook-f',
	),
	'instagram' => array(
		'title' => 'Instagram',
		'url' => 'instagram_url',
		'id' => 'instagram',
		'class' => 'fab fa-instagram',
	),
	'linkedin' => array(
		'title' => 'LinkedIn',
		'url' => 'linkedin_url',
		'id' => 'linkedin',
		'class' => 'fab fa-linkedin-in',
	),
	'tumblr' => array(
		'title' => 'Tumblr',
		'url' => 'tumblr_url',
		'id' => 'tumblr',
		'class' => 'fab fa-tumblr',
	),
	'pinterest' => array(
		'title' => 'Pinterest',
		'url' => 'pinterest_url',
		'id' => 'pinterest',
		'class' => 'fab fa-pinterest',
	),
	'github' => array(
		'title' => 'GitHub',
		'url' => 'github_url',
		'id' => 'github',
		'class' => 'fab fa-github',
	),
	'dribbble' => array(
		'title' => 'Dribbble',
		'url' => 'dribbble_url',
		'id' => 'dribbble',
		'class' => 'fab fa-dribbble',
	),
	'reddit' => array(
		'title' => 'reddit',
		'url' => 'reddit_url',
		'id' => 'reddit',
		'class' => 'fab fa-reddit',
	),
	'flickr' => array(
		'title' => 'Flickr',
		'url' => 'flickr_url',
		'id' => 'flickr',
		'class' => 'fab fa-flickr',
	),
	'skype' => array(
		'title' => 'Skype',
		'url' => 'skype_url',
		'id' => 'skype',
		'class' => 'fab fa-skype',
	),
	'youtube' => array(
		'title' => 'YouTube',
		'url' => 'youtube_url',
		'id' => 'youtube',
		'class' => 'fab fa-youtube',
	),
	'vimeo' => array(
		'title' => 'Vimeo',
		'url' => 'vimeo_url',
		'id' => 'vimeo',
		'class' => 'fab fa-vimeo',
	),
	'soundcloud' => array(
		'title' => 'SoundCloud',
		'url' => 'soundcloud_url',
		'id' => 'soundcloud',
		'class' => 'fab fa-soundcloud',
	),
	'wechat' => array(
		'title' => 'WeChat',
		'url' => 'wechat_url',
		'id' => 'wechat',
		'class' => 'fab fa-weixin',
	),
	'weibo' => array(
		'title' => 'Weibo',
		'url' => 'weibo_url',
		'id' => 'weibo',
		'class' => 'fab fa-weibo',
	),
	'renren' => array(
		'title' => 'Renren',
		'url' => 'renren_url',
		'id' => 'renren',
		'class' => 'fab fa-renren',
	),
	'qq' => array(
		'title' => 'QQ',
		'url' => 'qq_url',
		'id' => 'qq',
		'class' => 'fab fa-qq',
	),
	'xing' => array(
		'title' => 'XING',
		'url' => 'xing_url',
		'id' => 'xing',
		'class' => 'fab fa-xing',
	),
	'rss' => array(
		'title' => 'RSS',
		'url' => 'rss_url',
		'id' => 'rss',
		'class' => 'fas fa-rss',
	),
	'vk' => array(
		'title' => 'VK',
		'url' => 'vk_url',
		'id' => 'vk',
		'class' => 'fab fa-vk',
	),
	'behance' => array(
		'title' => 'Behance',
		'url' => 'behance_url',
		'id' => 'behance',
		'class' => 'fab fa-behance',
	),
	'foursquare' => array(
		'title' => 'Foursquare',
		'url' => 'foursquare_url',
		'id' => 'foursquare',
		'class' => 'fab fa-foursquare',
	),
	'steam' => array(
		'title' => 'Steam',
		'url' => 'steam_url',
		'id' => 'steam',
		'class' => 'fab fa-steam',
	),
	'twitch' => array(
		'title' => 'Twitch',
		'url' => 'twitch_url',
		'id' => 'twitch',
		'class' => 'fab fa-twitch',
	),
	'houzz' => array(
		'title' => 'Houzz',
		'url' => 'houzz_url',
		'id' => 'houzz',
		'class' => 'fab fa-houzz',
	),
	'yelp' => array(
		'title' => 'Yelp',
		'url' => 'yelp_url',
		'id' => 'yelp',
		'class' => 'fab fa-yelp',
	),
	'snapchat' => array(
		'title' => 'Snapchat',
		'url' => 'snapchat_url',
		'id' => 'snapchat',
		'class' => 'fab fa-snapchat',
	),
	'medium' => array(
		'title' => 'Medium',
		'url' => 'medium_url',
		'id' => 'medium',
		'class' => 'fab fa-medium',
	),
	'spotify' => array(
		'title' => 'Spotify',
		'url' => 'spotify_url',
		'id' => 'spotify',
		'class' => 'fab fa-spotify',
	),
	'whatsapp' => array(
		'title' => 'WhatsApp',
		'url' => 'whatsapp_url',
		'id' => 'whatsapp',
		'class' => 'fab fa-whatsapp',
	),
	'telegram' => array(
		'title' => 'Telegram',
		'url' => 'telegram_url',
		'id' => 'telegram',
		'class' => 'fab fa-telegram',
	),
	'mixcloud' => array(
		'title' => 'Mixcloud',
		'url' => 'mixcloud_url',
		'id' => 'mixcloud',
		'class' => 'fab fa-mixcloud',
	),
	'discord' => array(
		'title' => 'Discord',
		'url' => 'discord_url',
		'id' => 'discord',
		'class' => 'fab fa-discord',
	),
	'tiktok' => array(
		'title' => 'TikTok',
		'url' => 'tiktok_url',
		'id' => 'tiktok',
		'class' => 'fab fa-tiktok',
	),
	'patreon' => array(
		'title' => 'Patreon',
		'url' => 'patreon_url',
		'id' => 'patreon',
		'class' => 'fab fa-patreon',
	),
);

$movedo_grve_post_color_selection = array(
	'primary-1' => esc_html__( 'Primary 1', 'movedo' ),
	'primary-2' => esc_html__( 'Primary 2', 'movedo' ),
	'primary-3' => esc_html__( 'Primary 3', 'movedo' ),
	'primary-4' => esc_html__( 'Primary 4', 'movedo' ),
	'primary-5' => esc_html__( 'Primary 5', 'movedo' ),
	'primary-6' => esc_html__( 'Primary 6', 'movedo' ),
	'green' => esc_html__( 'Green', 'movedo' ),
	'orange' => esc_html__( 'Orange', 'movedo' ),
	'red' => esc_html__( 'Red', 'movedo' ),
	'blue' => esc_html__( 'Blue', 'movedo' ),
	'aqua' => esc_html__( 'Aqua', 'movedo' ),
	'purple' => esc_html__( 'Purple', 'movedo' ),
	'black' => esc_html__( 'Black', 'movedo' ),
	'grey' => esc_html__( 'Grey', 'movedo' ),
);

$movedo_grve_button_color_selection = array(
	'primary-1' => esc_html__( 'Primary 1', 'movedo' ),
	'primary-2' => esc_html__( 'Primary 2', 'movedo' ),
	'primary-3' => esc_html__( 'Primary 3', 'movedo' ),
	'primary-4' => esc_html__( 'Primary 4', 'movedo' ),
	'primary-5' => esc_html__( 'Primary 5', 'movedo' ),
	'primary-6' => esc_html__( 'Primary 6', 'movedo' ),
	'green' => esc_html__( 'Green', 'movedo' ),
	'orange' => esc_html__( 'Orange', 'movedo' ),
	'red' => esc_html__( 'Red', 'movedo' ),
	'blue' => esc_html__( 'Blue', 'movedo' ),
	'aqua' => esc_html__( 'Aqua', 'movedo' ),
	'purple' => esc_html__( 'Purple', 'movedo' ),
	'black' => esc_html__( 'Black', 'movedo' ),
	'grey' => esc_html__( 'Grey', 'movedo' ),
	'white' => esc_html__( 'White', 'movedo' ),
);

$movedo_grve_button_size_selection = array(
	'extrasmall' => esc_html__( 'Extra Small', 'movedo' ),
	'small' => esc_html__( 'Small', 'movedo' ),
	'medium' => esc_html__( 'Medium', 'movedo' ),
	'large' => esc_html__( 'Large', 'movedo' ),
	'extralarge' => esc_html__( 'Extra Large', 'movedo' ),
);

$movedo_grve_button_shape_selection = array(
	'square' => esc_html__( 'Square', 'movedo' ),
	'round' => esc_html__( 'Round', 'movedo' ),
	'extra-round' => esc_html__( 'Extra Round', 'movedo' ),
);

$movedo_grve_button_type_selection = array(
	'simple' => esc_html__( 'Simple', 'movedo' ),
	'outline' => esc_html__( 'Outline', 'movedo' ),
);

$movedo_grve_post_bg_opacity_selection = array(
	'none'  => '0%',
	'10'  => '10%',
	'20'  => '20%',
	'30'  => '30%',
	'40'  => '40%',
	'50'  => '50%',
	'60'  => '60%',
	'70'  => '70%',
	'80'  => '80%',
	'90'  => '90%',
	'100'  => '100%',
);

$movedo_grve_area_height = array(
	'small' => esc_html__( 'Small Height', 'movedo' ),
	'medium' => esc_html__( 'Medium Height', 'movedo' ),
	'large' => esc_html__( 'Large Height', 'movedo' ),
	'10'  => '10%',
	'15' => '15%',
	'20'  => '20%',
	'25' => '25%',
	'30'  => '30%',
	'35' => '35%',
	'40'  => '40%',
	'45' => '45%',
	'50'  => '50%',
	'55' => '55%',
	'60'  => '60%',
	'65' => '65%',
	'70'  => '70%',
	'75' => '75%',
	'80'  => '80%',
	'85'  => '85%',
	'90'  => '90%',
);

$movedo_grve_awsome_fonts_list = array( "500px", "address-book", "address-book-o", "address-card", "address-card-o", "adjust", "adn", "align-center", "align-justify", "align-left", "align-right", "amazon", "ambulance", "american-sign-language-interpreting", "anchor", "android", "angellist", "angle-double-down", "angle-double-left", "angle-double-right", "angle-double-up", "angle-down", "angle-left", "angle-right", "angle-up", "apple", "archive", "area-chart", "arrow-circle-down", "arrow-circle-left", "arrow-circle-o-down", "arrow-circle-o-left", "arrow-circle-o-right", "arrow-circle-o-up", "arrow-circle-right", "arrow-circle-up", "arrow-down", "arrow-left", "arrow-right", "arrow-up", "arrows", "arrows-alt", "arrows-h", "arrows-v", "asl-interpreting", "assistive-listening-systems", "asterisk", "at", "audio-description", "automobile", "backward", "balance-scale", "ban", "bandcamp", "bank", "bar-chart", "bar-chart-o", "barcode", "bars", "bath", "bathtub", "battery", "battery-0", "battery-1", "battery-2", "battery-3", "battery-4", "battery-empty", "battery-full", "battery-half", "battery-quarter", "battery-three-quarters", "bed", "beer", "behance", "behance-square", "bell", "bell-o", "bell-slash", "bell-slash-o", "bicycle", "binoculars", "birthday-cake", "bitbucket", "bitbucket-square", "bitcoin", "black-tie", "blind", "bluetooth", "bluetooth-b", "bold", "bolt", "bomb", "book", "bookmark", "bookmark-o", "braille", "briefcase", "btc", "bug", "building", "building-o", "bullhorn", "bullseye", "bus", "buysellads", "cab", "calculator", "calendar", "calendar-check-o", "calendar-minus-o", "calendar-o", "calendar-plus-o", "calendar-times-o", "camera", "camera-retro", "car", "caret-down", "caret-left", "caret-right", "caret-square-o-down", "caret-square-o-left", "caret-square-o-right", "caret-square-o-up", "caret-up", "cart-arrow-down", "cart-plus", "cc", "cc-amex", "cc-diners-club", "cc-discover", "cc-jcb", "cc-mastercard", "cc-paypal", "cc-stripe", "cc-visa", "certificate", "chain", "chain-broken", "check", "check-circle", "check-circle-o", "check-square", "check-square-o", "chevron-circle-down", "chevron-circle-left", "chevron-circle-right", "chevron-circle-up", "chevron-down", "chevron-left", "chevron-right", "chevron-up", "child", "chrome", "circle", "circle-o", "circle-o-notch", "circle-thin", "clipboard", "clock-o", "clone", "close", "cloud", "cloud-download", "cloud-upload", "cny", "code", "code-fork", "codepen", "codiepie", "coffee", "cog", "cogs", "columns", "comment", "comment-o", "commenting", "commenting-o", "comments", "comments-o", "compass", "compress", "connectdevelop", "contao", "copy", "copyright", "creative-commons", "credit-card", "credit-card-alt", "crop", "crosshairs", "css3", "cube", "cubes", "cut", "cutlery", "dashboard", "dashcube", "database", "deaf", "deafness", "dedent", "delicious", "desktop", "deviantart", "diamond", "digg", "dollar", "dot-circle-o", "download", "dribbble", "drivers-license", "drivers-license-o", "dropbox", "drupal", "edge", "edit", "eercast", "eject", "ellipsis-h", "ellipsis-v", "empire", "envelope", "envelope-o", "envelope-open", "envelope-open-o", "envelope-square", "envira", "eraser", "etsy", "eur", "euro", "exchange", "exclamation", "exclamation-circle", "exclamation-triangle", "expand", "expeditedssl", "external-link", "external-link-square", "eye", "eye-slash", "eyedropper", "fa", "facebook", "facebook-f", "facebook-official", "facebook-square", "fast-backward", "fast-forward", "fax", "feed", "female", "fighter-jet", "file", "file-archive-o", "file-audio-o", "file-code-o", "file-excel-o", "file-image-o", "file-movie-o", "file-o", "file-pdf-o", "file-photo-o", "file-picture-o", "file-powerpoint-o", "file-sound-o", "file-text", "file-text-o", "file-video-o", "file-word-o", "file-zip-o", "files-o", "film", "filter", "fire", "fire-extinguisher", "firefox", "first-order", "flag", "flag-checkered", "flag-o", "flash", "flask", "flickr", "floppy-o", "folder", "folder-o", "folder-open", "folder-open-o", "font", "font-awesome", "fonticons", "fort-awesome", "forumbee", "forward", "foursquare", "free-code-camp", "frown-o", "futbol-o", "gamepad", "gavel", "gbp", "ge", "gear", "gears", "genderless", "get-pocket", "gg", "gg-circle", "gift", "git", "git-square", "github", "github-alt", "github-square", "gitlab", "gittip", "glass", "glide", "glide-g", "globe", "google", "google-plus", "google-plus-circle", "google-plus-official", "google-plus-square", "google-wallet", "graduation-cap", "gratipay", "grav", "group", "h-square", "hacker-news", "hand-grab-o", "hand-lizard-o", "hand-o-down", "hand-o-left", "hand-o-right", "hand-o-up", "hand-paper-o", "hand-peace-o", "hand-pointer-o", "hand-rock-o", "hand-scissors-o", "hand-spock-o", "hand-stop-o", "handshake-o", "hard-of-hearing", "hashtag", "hdd-o", "header", "headphones", "heart", "heart-o", "heartbeat", "history", "home", "hospital-o", "hotel", "hourglass", "hourglass-1", "hourglass-2", "hourglass-3", "hourglass-end", "hourglass-half", "hourglass-o", "hourglass-start", "houzz", "html5", "i-cursor", "id-badge", "id-card", "id-card-o", "ils", "image", "imdb", "inbox", "indent", "industry", "info", "info-circle", "inr", "instagram", "institution", "internet-explorer", "intersex", "ioxhost", "italic", "joomla", "jpy", "jsfiddle", "key", "keyboard-o", "krw", "language", "laptop", "lastfm", "lastfm-square", "leaf", "leanpub", "legal", "lemon-o", "level-down", "level-up", "life-bouy", "life-buoy", "life-ring", "life-saver", "lightbulb-o", "line-chart", "link", "linkedin", "linkedin-square", "linode", "linux", "list", "list-alt", "list-ol", "list-ul", "location-arrow", "lock", "long-arrow-down", "long-arrow-left", "long-arrow-right", "long-arrow-up", "low-vision", "magic", "magnet", "mail-forward", "mail-reply", "mail-reply-all", "male", "map", "map-marker", "map-o", "map-pin", "map-signs", "mars", "mars-double", "mars-stroke", "mars-stroke-h", "mars-stroke-v", "maxcdn", "meanpath", "medium", "medkit", "meetup", "meh-o", "mercury", "microchip", "microphone", "microphone-slash", "minus", "minus-circle", "minus-square", "minus-square-o", "mixcloud", "mobile", "mobile-phone", "modx", "money", "moon-o", "mortar-board", "motorcycle", "mouse-pointer", "music", "navicon", "neuter", "newspaper-o", "object-group", "object-ungroup", "odnoklassniki", "odnoklassniki-square", "opencart", "openid", "opera", "optin-monster", "outdent", "pagelines", "paint-brush", "paper-plane", "paper-plane-o", "paperclip", "paragraph", "paste", "pause", "pause-circle", "pause-circle-o", "paw", "paypal", "pencil", "pencil-square", "pencil-square-o", "percent", "phone", "phone-square", "photo", "picture-o", "pie-chart", "pied-piper", "pied-piper-alt", "pied-piper-pp", "pinterest", "pinterest-p", "pinterest-square", "plane", "play", "play-circle", "play-circle-o", "plug", "plus", "plus-circle", "plus-square", "plus-square-o", "podcast", "power-off", "print", "product-hunt", "puzzle-piece", "qq", "qrcode", "question", "question-circle", "question-circle-o", "quora", "quote-left", "quote-right", "ra", "random", "ravelry", "rebel", "recycle", "reddit", "reddit-alien", "reddit-square", "refresh", "registered", "remove", "renren", "reorder", "repeat", "reply", "reply-all", "resistance", "retweet", "rmb", "road", "rocket", "rotate-left", "rotate-right", "rouble", "rss", "rss-square", "rub", "ruble", "rupee", "s15", "safari", "save", "scissors", "scribd", "search", "search-minus", "search-plus", "sellsy", "send", "send-o", "server", "share", "share-alt", "share-alt-square", "share-square", "share-square-o", "shekel", "sheqel", "shield", "ship", "shirtsinbulk", "shopping-bag", "shopping-basket", "shopping-cart", "shower", "sign-in", "sign-language", "sign-out", "signal", "signing", "simplybuilt", "sitemap", "skyatlas", "skype", "slack", "sliders", "slideshare", "smile-o", "snapchat", "snapchat-ghost", "snapchat-square", "snowflake-o", "soccer-ball-o", "sort", "sort-alpha-asc", "sort-alpha-desc", "sort-amount-asc", "sort-amount-desc", "sort-asc", "sort-desc", "sort-down", "sort-numeric-asc", "sort-numeric-desc", "sort-up", "soundcloud", "space-shuttle", "spinner", "spoon", "spotify", "square", "square-o", "stack-exchange", "stack-overflow", "star", "star-half", "star-half-empty", "star-half-full", "star-half-o", "star-o", "steam", "steam-square", "step-backward", "step-forward", "stethoscope", "sticky-note", "sticky-note-o", "stop", "stop-circle", "stop-circle-o", "street-view", "strikethrough", "stumbleupon", "stumbleupon-circle", "subscript", "subway", "suitcase", "sun-o", "superpowers", "superscript", "support", "table", "tablet", "tachometer", "tag", "tags", "tasks", "taxi", "telegram", "television", "tencent-weibo", "terminal", "text-height", "text-width", "th", "th-large", "th-list", "themeisle", "thermometer", "thermometer-0", "thermometer-1", "thermometer-2", "thermometer-3", "thermometer-4", "thermometer-empty", "thermometer-full", "thermometer-half", "thermometer-quarter", "thermometer-three-quarters", "thumb-tack", "thumbs-down", "thumbs-o-down", "thumbs-o-up", "thumbs-up", "ticket", "times", "times-circle", "times-circle-o", "times-rectangle", "times-rectangle-o", "tint", "toggle-down", "toggle-left", "toggle-off", "toggle-on", "toggle-right", "toggle-up", "trademark", "train", "transgender", "transgender-alt", "trash", "trash-o", "tree", "trello", "tripadvisor", "trophy", "truck", "try", "tty", "tumblr", "tumblr-square", "turkish-lira", "tv", "twitch", "twitter", "twitter-square", "umbrella", "underline", "undo", "universal-access", "university", "unlink", "unlock", "unlock-alt", "unsorted", "upload", "usb", "usd", "user", "user-circle", "user-circle-o", "user-md", "user-o", "user-plus", "user-secret", "user-times", "users", "vcard", "vcard-o", "venus", "venus-double", "venus-mars", "viacoin", "viadeo", "viadeo-square", "video-camera", "vimeo", "vimeo-square", "vine", "vk", "volume-control-phone", "volume-down", "volume-off", "volume-up", "warning", "wechat", "weibo", "weixin", "whatsapp", "wheelchair", "wheelchair-alt", "wifi", "wikipedia-w", "window-close", "window-close-o", "window-maximize", "window-minimize", "window-restore", "windows", "won", "wordpress", "wpbeginner", "wpexplorer", "wpforms", "wrench", "xing", "xing-square", "y-combinator", "y-combinator-square", "yahoo", "yc", "yc-square", "yelp", "yen", "yoast", "youtube", "youtube-play", "youtube-square" );

/**
 * Get CSS Color
 */
function movedo_grve_get_css_color( $prefix, $color ) {
	$rgb_color = preg_match( '/rgba/', $color ) ? preg_replace( array( '/\s+/', '/^rgba\((\d+)\,(\d+)\,(\d+)\,([\d\.]+)\)$/' ), array( '', 'rgb($1,$2,$3)' ), $color ) : $color;
	$string = $prefix . ':' . $rgb_color . ';';
	if ( $rgb_color !== $color ) $string .= $prefix . ':' . $color . ';';
	return $string;
}

/**
 * Get hex2rgba Color
 */
function movedo_grve_get_hex2rgba( $color = "#000000", $alpha = "1" ) {
	return "rgba(" . movedo_grve_hex2rgb( $color ) . "," . $alpha . ")";
}

/**
 * Get allowed HTML for microdata
 */
if ( ! function_exists( 'movedo_grve_get_microdata_allowed_html' ) ) {
	function movedo_grve_get_microdata_allowed_html() {
		$movedo_grve_microdata_allowed_html = array(
			'span' => array(
				'title' => true,
				'class' => true,
				'id' => true,
				'dir' => true,
				'align' => true,
				'lang' => true,
				'xml:lang' => true,
				'aria-hidden' => true,
				'data-icon' => true,
				'itemref' => true,
				'itemid' => true,
				'itemprop' => true,
				'itemscope' => true,
				'itemtype' => true,
				'xmlns:v' => true,
				'typeof' => true,
				'property' => true
			),
			'br' => array(),
		);

		return $movedo_grve_microdata_allowed_html;
	}
}


if ( !function_exists('movedo_grve_build_separator') ) {
	function movedo_grve_build_separator( $separator = '' , $color = '#ffffff', $size = '90px' ) {

		if( $size == '100%' ){
			$round_split_size = '100%';
		} else {
			$size = filter_var( $size, FILTER_SANITIZE_NUMBER_INT );
			$round_split_size = $size * 2;
		}

		switch( $separator ) {
			case 'triangle-separator':
				$separator_svg = '<svg class="grve-separator grve-svg-triangle" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="' . esc_attr( $color ) . '" width="100%" height="' . esc_attr( $size ) . '" viewBox="0 0 90 50"><polygon points="0,50 45,0 90,50 "/></svg>';
				break;
			case 'large-triangle-separator':
				$separator_svg = '<svg class="grve-separator grve-svg-large-triangle" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="' . esc_attr( $size ) . '" viewBox="0 0 1920 90" preserveAspectRatio="none"><polygon fill="' . esc_attr( $color ) . '" points="960,45 0,0 0,90 1920,90 1920,0 "/></svg>';
				break;
			case 'tilt-left-separator':
				$separator_svg = '<svg class="grve-separator grve-tilt-left-separator" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="' . esc_attr( $color ) . '" width="100%" height="' . esc_attr( $size ) . '" viewBox="0 0 1920 90" preserveAspectRatio="none"><polygon class="fil0" points="1920,90 0,90 1920,0 "/></svg>';
				break;
			case 'tilt-right-separator':
				$separator_svg = '<svg class="grve-separator grve-tilt-right-separator" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="' . esc_attr( $color ) . '" width="100%" height="' . esc_attr( $size ) . '" viewBox="0 0 1920 90" preserveAspectRatio="none"><polygon class="fil0" points="0,90 1920,90 0,0 "/></svg>';
				break;
			case 'curve-separator':
				$separator_svg = '<svg class="grve-separator grve-curve-separator" xmlns="http://www.w3.org/2000/svg" version="1.1"  width="100%" height="' . esc_attr( $size ) . '" viewBox="0 0 1920 90" preserveAspectRatio="none"><path fill="' . esc_attr( $color ) . '" d="M0,90C0,40.294,429.807,0,960,0s960,40.294,960,90H0z"/></svg>';
				break;
			case 'curve-left-separator':
				$separator_svg = '<svg class="grve-separator grve-curve-left-separator" xmlns="http://www.w3.org/2000/svg" version="1.1"  width="100%" height="' . esc_attr( $size ) . '" viewBox="0 0 1920 90" preserveAspectRatio="none"><path fill="' . esc_attr( $color ) . '" d="M0,0c703,0,1799.426,155.567,1920,0v90H0V0z"/></svg>';
				break;
			case 'curve-right-separator':
				$separator_svg = '<svg class="grve-separator grve-curve-right-separator" xmlns="http://www.w3.org/2000/svg" version="1.1"  width="100%" height="' . esc_attr( $size ) . '" viewBox="0 0 1920 90" preserveAspectRatio="none"><path fill="' . esc_attr( $color ) . '" d="M1920,0C1217,0,120.574,155.567,0,0v90h1920V0z"/></svg>';
				break;
			case 'round-split-separator':
				$separator_svg = '<svg class="grve-separator grve-round-split-separator" xmlns="http://www.w3.org/2000/svg" version="1.1"  width="' . esc_attr( $round_split_size ) . '" height="' . esc_attr( $size ) . '" viewBox="0 0 90 45" preserveAspectRatio="none"><path fill="' . esc_attr( $color ) . '" d="M90,45L90,45C65.148,44.999,45,24.854,45,0l0,0c0,24.854-20.146,44.999-45,44.999V45H90z"/></svg>';
				break;
			case 'torn-paper-separator':
				$separator_svg = '<svg class="grve-separator grve-svg-torn" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="' . esc_attr( $size ) . '" viewBox="0 0 1920 60" preserveAspectRatio="none"><path fill="' . esc_attr( $color ) . '" fill-rule="evenodd" clip-rule="evenodd" d="M42.728,16.599c9.228,14.816-39.39,9.974,36.298,6.492 c16.02-7.791,21.766-13.806,29.15-15.183c18.792,7.369,12.938,16.7,24.706,14.923c19.107,1.62,21.645,4.295,24.443,3.992 c19.532,0.602,23.42-2.739,27.408-2.238c15.269,8.654,29.658,7.357,39.264,6.713c8.322-3.869,4.44-10.481,4.44-10.481 c17.429,0.081,21.966,4.916,26.967,3.993c6.749-1.245,10.922-10.161,17.776-10.449c0.687,11.035,7.926,14.922,7.926,14.922 c16.338,7.064,27.334-2.205,40.743,0.748c20.006,0.072,36.746,9.646,46.255,1.268c64.623-56.952,28.432-5.807,39.489-16.938 c16.442,9.912,22.113,2.631,24.225,2.762c32.984,13.107,1.124,2.18,49.407,4.736c18.053,1.998,34.622-2.404,51.114-0.743 c16.608,1.674,2.018,14.925,18.518,9.698c6.111-1.936,10.884-7.164,17.038-8.955c21.589-2.432,24.99-8.342,30.373-9.697 c14.393,3.431,19.179,2.239,23.964,2.239c-7.127,7.735,34.558-0.999,42.263-7.463c16.464,3.134,17.354,5.277,18.775,6.979 c14.701,5.671,14.303,9.265,16.073,9.957c24.503,4.32,46.255,4.731,60.746-0.743c21.139-4.334,28.053-6.946,34.369-8.955 c12.832-4.081-1.319,7.396,15.558,8.207c17.235-6.42,20.293-9.697,23.963-9.697C912.494-8,844.468,8.95,866.353,8.95 c28.971,4.613,27.289-4.495,29.15-8.95c22.775,10.511,56.035,19.17,65.445,19.918c21.356-4.961,23.647-2.734,26.226-2.981 c22.418,2.435,29.441-2.548,37.035-2.986c30.947,12.058,3.238,1.833,40.264,5.225c26.562,5.928,31.99-0.134,47.406-2.986 c24.84-2.84,27.172-4.79,29.15-6.976c17.416,8.346,19.512-1.767,25.188,1.751c16.482,10.218,24.496,22.792,45.926,17.161 c10.627-5.809,28.699,1.072,31.373-0.744c15.418-5.719,14.408-10.484,16.334-9.96c15.781,4.358,18.074,6.828,21.039,7.722 c23.295,2.238,28.391-13.158,36.297-16.417c4.316-1.778,7.625,9.917,11.109,11.192c23.453-1.396,23.262,1.141,24.705,1.492 c92.949,22.566-17.523-4.687,26.447-2.235c13.688,7.079,22.062-1.5,27.408,1.491c25.576,7.956,37.385,2.982,45.186,2.982 c22.551-6.436,25.021-5.34,30.631-5.969c21.697,5.066,24.664,3.502,27.186,4.517c21.406,4.458,21.693,1.073,23.705,0 c49.031-15.261,116.562,3.021,116.562,3.021s30.617-2.253,37.814-11.94c23.543,4.434,28.74,7.078,34.334,7.723 c24.664,1.831,27.061-2.885,35.852-7.463c12.189,7.018,2.307,6.385,11.855,11.193c14.693-9.779,19.664-3.969,25.443-2.982 c23.627,4.029,6.672-0.377,20.004-5.972c10.193,8.832,19.617,2.306,27.408-0.744c25.084,0.585,39.549,2.333,47.395,4.143 c33.402-6.484,29.643-5.933,29.643-5.933V60H0V31.297C0,31.297,26.24,22.639,42.728,16.599L42.728,16.599z"/></svg>';
				break;
			default:
				$separator_svg = '';
				break;
		}

		return $separator_svg;

	}
}

/**
 * Get Adaptive URL
 */
function movedo_grve_get_adaptive_url( $media_id, $image_size = "responsive" ) {

	if ( 'full' == $image_size ) {
		$default_src = wp_get_attachment_image_src( $media_id, 'full'  );
		$img_url = $default_src[0];
	} elseif ( 'extra-extra-large' == $image_size ) {
		$default_src = wp_get_attachment_image_src( $media_id, 'movedo-grve-fullscreen' );
		$img_url = $default_src[0];
	} else {
		$resolutions   = array( 2560, 1600, 768 );
		$hidpi         = TRUE;
		$resolution = FALSE;

		// Get resolution cookie
		if ( isset( $_GET['resolution'] ) ) {
			$cookie_resolution = $_GET['resolution'];
		} else if ( isset( $_COOKIE['resolution'] ) ) {
			$cookie_resolution = $_COOKIE['resolution'];
		} else {
			$cookie_resolution = null;
		}

		// Default values
		$client_width  = 1920;
		$pixel_density = 1;

		if ( isset( $cookie_resolution ) && preg_match( "/^[0-9]+[,]+[0-9.]+$/", $cookie_resolution ) ) {
			$cookie_array = explode( ',', $cookie_resolution );
			// Get screen width.
			if ( count( $cookie_array ) > 0 ) {
				$client_width  = intval( $cookie_array[0] );
			}
			// Get pixel density.
			if ( $hidpi ) {
				if ( count( $cookie_array ) > 1 ) {
					$pixel_density = $cookie_array[1];
				}
			}
		}

		// Scale client screen width according to its pixel density.
		$client_width_scaled = $client_width * $pixel_density;

		// Find the closest available resolution
		$closest = null;
		foreach ( $resolutions as $res ) {
			if ( $closest == null || abs( $client_width_scaled - $closest ) > abs( $res - $client_width_scaled ) ) {
				$closest = $res;
			}
		}
		$resolution = $closest;

		$default_src = wp_get_attachment_image_src( $media_id, 'movedo-grve-fullscreen' );
		$skip_check = false;
		switch( $resolution ) {
			case '2560':
				$img_src = wp_get_attachment_image_src( $media_id, 'full' );
				$skip_check = true;
			break;
			case '768':
				$img_src = wp_get_attachment_image_src( $media_id, 'large' );
			break;
			case '1600':
			default:
				$img_src = $default_src;
			break;
		}

		if( $img_src[1] > $default_src[1]  && !$skip_check ) {
			$img_url = $default_src[0];
		} else {
			$img_url = $img_src[0];
		}
	}

	return $img_url;
}

/**
 * Get post width array
 */
if ( ! function_exists( 'movedo_grve_get_post_width_array' ) ) {
	function movedo_grve_get_post_width_array() {
		$movedo_grve_width_array = array(
			'container' => movedo_grve_option( 'container_size', 1170 ),
			'large' => 1170,
			'medium' => 990,
			'small' => 770,
			'1170' => 1170,
			'990' => 990,
			'770' => 770,
		);
		return $movedo_grve_width_array;
	}
}

/**
 * Get post title width
 */
if ( ! function_exists( 'movedo_grve_get_post_title_width_array' ) ) {
	function movedo_grve_get_post_title_width_array() {
		return array(
			'container' => 1170,
			'large' => 900,
			'medium' => 600,
			'small' => 400,
		);
	}
}

/**
 * Extract video ID from youtube url
 */
if ( ! function_exists( 'movedo_grve_extract_youtube_id' ) ) {
	function movedo_grve_extract_youtube_id( $url ) {
		$youtube_id = "";
		parse_str( parse_url( $url, PHP_URL_QUERY ), $vars );
		if ( ! isset( $vars['v'] ) ) {
			$youtube_id = '';
		}
		$youtube_id = $vars['v'];

		return apply_filters( 'movedo_grve_privacy_bg_youtube_id', $youtube_id );
	}
}

/**
 * Allow additional tags in post content
 */
if ( ! function_exists( 'movedo_grve_wp_kses_allowed_html' ) ) {
	function movedo_grve_wp_kses_allowed_html( $allowedposttags, $context ) {
		if ( is_array( $context ) ){
			return $allowedposttags;
		}
		if ( 'post' === $context ) {
			$allowedposttags['iframe'] = array(
				'src' => true,
				'srcdoc' => true,
				'name' => true,
				'sandbox' => true,
				'seamless' => true,
				'width' => true,
				'height' => true,
				'align' => true,
				'frameborder' => true,
				'scrolling' => true,
				'marginwidth' => true,
				'marginheight' => true,
				'allow' => true,
				'id' => true,
				'class' => true,
				'style' => true,
			);
		}
		return $allowedposttags;
	}
}
add_filter( 'wp_kses_allowed_html', 'movedo_grve_wp_kses_allowed_html', 10, 2 );

if ( ! function_exists( 'movedo_grve_social_rel' ) ) {
	function movedo_grve_social_rel() {
		$social_rel = array ( 'noopener', 'noreferrer' );
		if ( movedo_grve_visibility( 'social_rel_follow' ) ) {
			$social_rel[] = 'nofollow';
		}
		return $social_rel;
	}
}

/**
 * Custom Content Filters
 */
add_filter( 'movedo_grve_the_content', 'wptexturize'                       );
add_filter( 'movedo_grve_the_content', 'convert_smilies',               20 );
add_filter( 'movedo_grve_the_content', 'shortcode_unautop'                 );
add_filter( 'movedo_grve_the_content', 'prepend_attachment'                );
if ( version_compare( get_bloginfo('version'), '5.5', '>=' ) ) {
	add_filter( 'movedo_grve_the_content', 'wp_filter_content_tags' );
} else {
	add_filter( 'movedo_grve_the_content', 'wp_make_content_images_responsive' );
}
add_filter( 'movedo_grve_the_content', 'do_shortcode',                  11 );

//Omit closing PHP tag to avoid accidental whitespace output errors.
