<div id="user-{{ID}}" class="modal hide fade person card-back {{type}}" aria-labelledby="modal-person-label" aria-hidden="true" data-type="{{type}}" tabindex="-1">

	<figure id="vcard-lastfirst-{{ID}}" itemscope="itemscope" itemtype="http://www.data-vocabulary.org/Person/">
		<figcaption>

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<header class="n" title="Name">
					<h3 class="fn" itemprop="name">
						<span class="given-name">{{first_name}}</span>
						<span class="family-name">{{last_name}}</span>
					</h3>
					<div class="primary-job">{{primary_job}}</div>
				</header><!-- .n -->
			</div><!-- .modal-header -->

			<div class="modal-body">
				<img src="{{{avatar}}}" height="165" width="165" alt="{{first_name}} {{last_name}}" class="thumbnail avatar pull-right">
				<section class="note">
					<header>
						<h4>Contact</h4>
					</header>
					<ul class="border-left">
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
					{{#if description}}
					<header>
						<h4>Biography</h4>
					</header>
					<p>{{description}}</p>
					{{/if}}

					{{#if skills}}
					<section>
						<header><h4>Skills</h4></header>
						<ul class="border-left">
						{{#each skills}}
							<li>{{this}}</li>
						{{/each}}
						</ul>
					</section>
					{{/if}}
				</section>
			</div><!-- modal-body -->

		</figcaption><!-- .figcaption -->
	</figure>
</div><!-- .vcard -->