			<form action="{{  url('contact') }}" method="POST">	
				{{ csrf_field() }}	
				<div class="container">	
					<div class="col-md-3"></div>
					<div class="col-md-3">
			  			<div class="form-group">
					    	<input type="text" class="contact" name="name" id="name" placeholder="NAME" required>
				  		</div>
				  		<div class="form-group">
					    	<input type="text" class="contact" name="postcode" id="postcode" placeholder="POSTCODE" required>
					  	</div>	
			  		</div>		
					<div class="col-md-3">
			  			<div class="form-group">
					    	<input type="email" class="contact" name="email" id="email" placeholder="EMAIL" required>
				  		</div>
				  		<div class="form-group">
					    	<input type="text" class="contact" name="phone" id="phone" placeholder="PHONE" required>
					  	</div>	
			  		</div>	
					<div class="col-md-3"></div>
			  	</div>
			  	<div class="container">				  			
					<div class="col-md-3"></div>
			  		<div class="col-md-6">
			  			<div class="form-group">
			  			 	<textarea class="contact" name="message" placeholder="YOUR MESSAGE" required></textarea>
			  			</div>
			  		</div>	
					<div class="col-md-3"></div>
				</div>
				<div class="container">				  			
					<div class="col-md-5"></div>
			  		<div class="col-md-2">
			  			<div style="text-align: center;">
			  				<button type="submit" class="contact">SUBMIT</button>
			  			</div>
					</div>	
					<div class="col-md-5"></div>
				</div>
			</form>