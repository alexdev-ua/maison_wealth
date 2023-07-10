<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<meta name="title" content="{{ isset($pageData['title']) ? $pageData['title'] : null }}" />
<meta name="description" content="{{ isset($pageData['description']) ? $pageData['description'] : null }}" />
<meta name="keywords" content="{{ isset($pageData['keywords']) ? $pageData['keywords'] : null }}" />

<meta property="og:title" content="{{ isset($pageData['title']) ? $pageData['title'] : null }}" />
<meta property="og:description" content="{{ isset($pageData['description']) ? $pageData['description'] : null }}" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="Maison Wealth" />
<meta property="og:image" content="{{route('home')}}/images/ic_logo_red.svg" />

<meta property="twitter:card" content="summary" />
<meta property="twitter:title" content="{{ isset($pageData['title']) ? $pageData['title'] : null }}" />
<meta property="twitter:description" content="{{ isset($pageData['description']) ? $pageData['description'] : null }}" />
<meta property="twitter:image:src" content="{{route('home')}}/images/ic_logo_red.svg" />

<title>{{ isset($pageData['title']) ? $pageData['title'] : 'Maison Wealth' }}</title>
<link rel="shortcut icon" sizes="16x16 32x32 64x64"
href="/images/ic_logo_red.svg" type="image/x-icon" />
<link rel="icon" href="/images/ic_logo_red.svg" type="image/x-icon" />
<link rel="apple-touch-icon" href="/images/ic_logo_red.svg" />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Marck+Script&display=swap" rel="stylesheet">

<link rel="stylesheet" href="/assets/bootstrap/bootstrap-4.3.1/bootstrap.min.css">

<script src="/assets/jquery-3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="/assets/bootstrap/bootstrap-4.3.1/bootstrap.min.js" crossorigin="anonymous"></script>

<link rel="stylesheet" href="/assets/bootstrap/select/select.min.css">
<script src="/assets/bootstrap/select/select.min.js"></script>

<link href="/css/main_mobile.css?<?=date("HisdmY");?>" rel="stylesheet">

<script src="/js/main.js?<?=date("HisdmY");?>"></script>
<script src="/js/main_mobile.js?<?=date("HisdmY");?>"></script>

<link href="/assets/slick/slick.css" rel="stylesheet">
<link href="/assets/slick/slick-theme.css" rel="stylesheet">
<script src="/assets/slick/slick.min.js"></script>

<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '832637727863912');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=832637727863912&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
