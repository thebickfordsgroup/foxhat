			<form action="{{  url('store') }}" method="POST">	
				{{ csrf_field() }}	
				<div class="row">	
					<div class="col-md-2"></div>
					<div class="col-md-4">
			  			<div class="form-group">
					    	<input type="text" class="contact" name="fname" id="fname" placeholder="FIRST NAME" required>
				  		</div>
			  		</div>	
					<div class="col-md-4">
				  		<div class="form-group">
					    	<input type="text" class="contact" name="lname" id="lname" placeholder="LAST NAME" required>
				  		</div>
			  		</div>	
					<div class="col-md-2"></div>
			  	</div>	
				<div class="row">	
					<div class="col-md-2"></div>
					<div class="col-md-8">
				  		<div class="form-group">
					    	<input type="email" class="contact" name="email" id="email" placeholder="EMAIL ADDRESS" required>
					  	</div>	
			  		</div>		
					<div class="col-md-2"></div>
			  	</div>
			  	<br/>
				<div class="row">				  			
			  		<div class="col-md-12 challenge-div">
			          <button class="age-btn-no mc" type="button" onclick="close_subscribe()">◄ CLOSE</button>
			          <button class="age-btn-yes mc" type="submit">SUBMIT ►</button>
			          <button id="myBtn" style="display: none;"></button><br/><br/>
					</div>	
				</div>
			</form>