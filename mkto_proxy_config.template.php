<?php
/*
 * If no redirect URL is set in Marketo or if
 * the form submission has been corrupted,
 * where should we redirect to?
 * (This should probably be a general Thank You page)
 */
$DEFAULT_REDIRECT = 'http://YOUR-COMPANY.com/thank-you.html';

/*
 * What is the POST URL for your form?
 * You can find this in the source of any current landing page with a form
 * It will look something like this:
 * <form class="lpeRegForm formNotEmpty" method="post" enctype="application/x-www-form-urlencoded" action="http://app-k.marketo.com/index.php/leadCapture/save" id="mktForm_1213" name="mktForm_1213">
 * In this case, you would enter: http://app-k.marketo.com/index.php/leadCapture/save
 */
$POST_URL = 'http://app-XYZ.marketo.com/index.php/leadCapture/save';
