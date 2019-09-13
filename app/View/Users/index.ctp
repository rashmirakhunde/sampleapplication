
    <div class="fadeIn first">
        <h2>User Login</h2>
    </div>
    <?php echo $this->Form->create('User'); ?>
    
    <?php echo $this->Session->flash(); ?>

    <?php echo $this->Form->input(
    	                           '',
    	                            array(
    	                            	   'type'   => 'text',
    	                            	    'id'    => 'login',
                                            'name'  => 'data[User][name]',
    	                            	    'class' => 'fadeIn second',
    	                            	    'placeholder' => 'Username',
    	                            	 )
    	                         ); 
    ?>

    <?php echo $this->Form->input(
    	                           '',
    	                            array(
    	                            	   'type'   => 'password',
    	                            	    'id'    => 'password',
                                            'name'  => 'data[User][password]',
    	                            	    'class' => 'fadeIn third',
    	                            	    'placeholder' => 'Password',
    	                            	 )
    	                         ); 
    ?>

    <?php echo $this->Form->end(
    	                           'Login',
    	                            array(
    	                            	   'type'   => 'submit',
    	                            	    'class' => 'fadeIn fourth',
    	                            	 )
    	                         ); 
    ?>
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>