
		<script type="text/javascript">
			$j = jQuery.noConflict();
			$j(document).ready(function() {
				
				$j.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}'
					}
				});
				
				$j(".ajax-submit-change").change(function(e){
					e.preventDefault();
					var $this = $j(this);
					
					var formData = new FormData();
					formData.append('action', $this.attr("data-action"));
					formData.append('id', $this.attr("data-id"));
					formData.append('id2', $this.attr("data-id2"));
					formData.append('value', $this.val());
					
					custom_ajax_call($this, formData);
				});
				
				$j(".ajax-submit").click(function(e){
					e.preventDefault();
					var $this = $j(this);
					
					var formData = new FormData();
					formData.append('action', $this.attr("data-action"));
					formData.append('id', $this.attr("data-id"));
					formData.append('id2', $this.attr("data-id2"));
					formData.append('var_amount', $this.data("var_amount"));
					//console.log(formData);
					//console.log($this.data('var_amount'));
					//console.log($this.closest('.row').parent().find('.ajax-submit').data('var_amount'));
					if ($this.hasClass("ajax-form")) {
						var validation_error = false;
						var $form = $this.parents("form");
						
						$form.find('.ajax-field').each(function(){
							var $field = $j(this);
							
							if ($field.attr("required") && $field.val() == "") {
								$field.focus();
								validation_error = true;
								return false;
							}
							
							formData.append($field.attr("name"), $field.val());
						});
						
						if (validation_error) return false;
					}
					//console.log(formData);
					custom_ajax_call($this, formData);
				});
				
				function custom_ajax_call($this, formData) {
					
					$j.ajax({
						type:'POST',
						url:'{{ route("account.ajax") }}',
						data : formData,
						processData: false,
						contentType: false,
						success:function(data){
								
							if (data.status) {
								if (data.status == "success") {
									
									if ($this.hasClass("ajax-toggle")) {
										
										$this.find('.ajax_toggle.default').hide();
										$this.find('.ajax_toggle.hidden').show();
										
									} else {
										
										if (data.reload == true) {
											document.location.reload(true);
										} else if (data.redirect) {
											document.location.href=data.redirect;
										}
									
									}
									
								} if (data.status == "redirect") {
									
									if (data.redirect) {
										document.location.href=data.redirect;
									}
									
								} else {
									
									if (data.message) {
										alert(data.message);
									}
									
								}
							}
						
						}
					});
					
				}
				
			});
		</script>
