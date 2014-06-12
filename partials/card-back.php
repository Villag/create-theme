<div id="user-{{ID}}" class="modal fade person card-back {{types}}" aria-labelledby="modal-person-label" aria-hidden="true" data-type="{{type}}" tabindex="-1">

	<figure id="vcard-lastfirst-{{ID}}" itemscope="itemscope" itemtype="http://www.data-vocabulary.org/Person/">
		<figcaption>

			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<header class="n" title="Name">
							<img src="{{{avatar}}}" height="55" width="55" alt="{{first_name}} {{last_name}}" class="thumbnail avatar pull-left">
							<h3 class="fn" itemprop="name">
								<span class="given-name">{{first_name}}</span>
								<span class="family-name">{{last_name}}</span>
							</h3>
							<div class="primary-job">{{primary_jobs}}</div>
						</header><!-- .n -->
					</div><!-- .modal-header -->

					<div class="modal-body">
						<section class="note">
							<header>
								<h4>Contact</h4>
							</header>
							<ul>
								{{#if website}}
									<li class="website"><a href="{{website}}" target="_blank" class="url" itemprop="url" rel="me self external">{{website}}</a></li>
								{{/if}}
								{{#if twitter}}
									<li class="twitter"><a href="http://twitter.com/{{twitter}}" target="_blank"><i class="icon-twitter"></i> {{twitter}}</a></li>
								{{/if}}

								<?php if( is_user_logged_in() ) { ?>
									{{#if phone}}
										<li class="tel"><abbr class="value" itemprop="tel" title="+1{{phone}}">{{phone}}</abbr></li>
									{{/if}}
									{{#if email}}
										<li class="email"><a href="#email-user" data-user-id-to="{{ID}}" data-modal-id="email-user" data-toggle="modal"><i class="icon-envelope"></i> Email</a></li>
									{{/if}}
								<?php } else { ?>
									{{#if phone}}
										<li><small><a href="#" data-reveal-id="login" data-animation="fade" data-animationSpeed="12000">Login to get phone number</a></small></li>
									{{/if}}
									<li><small><a href="#" data-reveal-id="login" data-animation="fade" data-animationSpeed="12000">Login to email this user</a></small></li>
								<?php } ?>
							</ul>
						</section>

						<section title="Biography">
							{{#if bio}}
							<header>
								<h4>Biography</h4>
							</header>
							<p class="bio">{{{bio}}}</p>
							{{/if}}

							{{#if skills}}
							<section>
								<header><h4>Skills</h4></header>
								<ul>
								{{#each skills}}
									<li>{{this}}</li>
								{{/each}}
								</ul>
							</section>
							{{/if}}
						</section>
					</div><!-- modal-body -->
				</div>
			</div>

		</figcaption><!-- .figcaption -->
	</figure>
</div><!-- .vcard -->