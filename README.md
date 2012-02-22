Marketo Form Proxy (v1.0)
=========================

Marketo Form Proxy enables forms to be submitted to Marketo while removing any tracking information.  The most common example where this can be used is a customer referral landing page.

### Server Requirements ###

- PHP
- CURL

### Server Installation ###

1. Edit the variables in `mkto_proxy_config.template.php` as necessary
2. Rename `mkto_proxy_config.template.php` to `mkto_proxy_config.php`
3. Drop the entire directory onto your website (or subdomain), e.g. `http://YOUR-COMPANY.COM/post-proxy/` or `http://post-proxy.YOUR-COMPANY.COM/`
4. Visit the directory you just created.  If it redirects to the default URL you set in `mkto_proxy_config.php`, it works. Otherwise, you must've skipped a step.

### Now, on each landing page... ###

1. Enter the following into the `Custom HEAD HTML` (click `Landing Page Actions`, then `Edit Page Meta Tags`):

    <script type="text/javascript">
    (function($) {
    
        var ACTION_URL = 'http://YOUR-COMPANY.COM/post-proxy/';
        
        $(function(){
            $('form')[0].reset();
            $('form').attr('action',ACTION_URL+'?kill_mkt_trk=1').find('input[name=_mkt_trk]').val('WeLoveNathan');
        });
    
    })(jQuery);
    </script>

2. Update that code. Replace `http://YOUR-COMPANY.COM/post-proxy/` with the URL to the directory you created in #3 above.
3. Save your landing page and test throughly.

### Contributions ###

This script is open sourced under a modified BSD license (more on that below).  It does not require you to send contributions, but if you have any you'd like to share, please submit a PULL request through GitHub.

### License ###

Copyright (c) 2012 Marketo, Inc. - www.marketo.com
All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

* Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
* Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the
  documentation and/or other materials provided with the distribution.
* Neither the name of Marketo, Inc. nor the names of its contributors may be used to endorse or promote products derived from this software
  without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE
LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT,
STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY
OF SUCH DAMAGE.