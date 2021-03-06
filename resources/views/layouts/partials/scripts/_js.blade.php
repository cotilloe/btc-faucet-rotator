@if(env('APP_ENV') == 'local')
    <script src="{{ asset("/assets/js/mainScripts.js") . "?" . rand() }}"></script>
@elseif(env('APP_ENV') == 'production')
    <script src="{{ asset("/assets/js/mainScripts.min.js") . "?" . rand() }}"></script>
@else
    <script src="{{ asset("/assets/js/mainScripts.js") . "?" . rand() }}"></script>
@endif
@if(\App\Helpers\WebsiteMeta\WebsiteMeta::activatedAdBlockBlocking() == true)
    <script src="{{ asset("/assets/js/blockadblock/custom.blockadblock.js") . "?" . rand() }}"></script>
@endif
@if(!empty(\App\Helpers\WebsiteMeta\WebsiteMeta::addThisId()))
<script src="https://s7.addthis.com/js/300/addthis_widget.js#pubid={{ \App\Helpers\WebsiteMeta\WebsiteMeta::addThisId() }}" async="async"></script>
@endif
@stack('scripts')