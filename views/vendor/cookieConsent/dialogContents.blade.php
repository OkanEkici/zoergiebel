<div class="js-cookie-consent cookie-consent">

	<div class="modal fade show" id="modalCookieConsent" tabindex="-1" role="dialog" style="display: block; background-color:rgba(0,0,0,0.4);" aria-modal="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			
					<div class="modal-header line-height-fixed font-size-lg">
						
						<span class="cookie-consent__header">
								{!! trans('cookieConsent::texts.header') !!}
						</span>
						
						<button type="button" class="close js-cookie-consent-close" data-dismiss="modal" aria-label="Close">
							<i class="fe fe-x" aria-hidden="true"></i>
						</button>
						
					</div>
					
					<div class="modal-body">
						
						<span class="cookie-consent__message">
								{!! trans('cookieConsent::texts.message') !!}
						</span>
						<a href="{{ route('cms.datenschutz') }}" class="cookie-consent__link">
								{!! trans('cookieConsent::texts.more') !!}
						</a>
						
						<br>
						<br>
						<button class="js-cookie-consent-agree cookie-consent__agree">
								{{ trans('cookieConsent::texts.agree') }}
						</button>
						
					</div>
					
			</div>
		</div>
	</div>

</div>
