<?php include ('core/init.php'); ?>

<?php
//Create DB Object
$db = new Database;

//Run Query 
$db->query("SELECT * FROM `addressbook_contacts`");

//Assign Result Set
$contacts = $db->resultset();
?>

<div class="row">
    <div class="large-12 columns">
        <table>
            <thead>
                <tr>
                    <th width="200">Name</th>
                    <th width="130">Phone</th>
                    <th width="200">Email</th>
                    <th width="250">Adress</th>
                    <th width="100">Group</th>
                    <th width="150">Actions</th>
                </tr>
            </thead>
            <tbody>
            	
            	<?php foreach($contacts as $contact) : ?>
                <tr>
                    <td><a href="#"><?php echo $contact->first_name.' '.$contact->last_name; ?></a></td>
                    <td><?php echo $contact->phone;?></td>
                    <td><?php echo $contact->email;?></td>
                    <td>
                        <ul>
                            <li><?php echo $contact->address1;?></li>
                            <li><?php if($contact->address2) echo $contact->address2; ?></li>
                            <li><?php echo $contact->city.' '.$contact->state.' '.$contact->zipcode;?></li>
                        </ul>
                    </td>
                    <td><?php echo $contact->contact_group;?></td>
                    <td>
                        <ul class="button-group">
                            <li>
                            	<a href="#" class="button tiny" data-reveal-id="editModal<?php echo $contact->id;?>" data-contact-id="<?php echo $contact->id;?>">Edit</a>
                            	<div id="editModal<?php echo $contact->id;?>" data-cid="<?php echo $contact->id; ?>" class="reveal-modal editModal" data-reveal>
                            		<h2>Edit Contact</h2>
					                <form id="editContact" action="#" method="post">
					                    <div class="row">
					                        <div class="large-6 columns">
					                            <label>
					                                First Name
					                                <input name="first_name" type="text" placeholder="Enter First Name" value="<?php echo $contact->first_name; ?>" />
					                            </label>
					                        </div>
					                        <div class="large-6 columns">
					                            <label>
					                                Last Name
					                                <input name="last_name" type="text" placeholder="Enter Last Name" value="<?php echo $contact->last_name; ?>"/>
					                            </label>
					                        </div>
					                    </div>
					                    
					                    <div class="row">
					                        <div class="large-4 columns">
					                            <label>
					                                Email
					                                <input name="email" type="email" placeholder="Enter Email Adress" value="<?php echo $contact->email; ?>"/>
					                            </label>
					                        </div>
					                        <div class="large-4 columns">
					                            <label>
					                                Phone Number
					                                <input name="phone" type="text" placeholder="Enter Phone Number" value="<?php echo $contact->phone; ?>"/>
					                            </label>
					                        </div>
					                        <div class="large-4 columns">
					                            <label>
					                                Contact Group
					                                <select name="contact_group">
					                                    <option value="Family" <?php if($contact->contact_group == 'Family') echo "selected" ?>>Family</option>
					                                    <option value="Friends" <?php if($contact->contact_group == 'Friends') echo "selected" ?>>Friends</option>
					                                    <option value="Business" <?php if($contact->contact_group == 'Business') echo "selected" ?>>Business</option>
					                                </select>
					                            </label>
					                        </div>
					                    </div>
					                    
					                    <div class="row">
					                        <div class="large-6 columns">
					                            <label>
					                                Address 1
					                                <input name="address1" type="text" placeholder="Enter Your First Address" value="<?php echo $contact->address1; ?>"/>
					                            </label>
					                        </div>
					                        <div class="large-6 columns">
					                            <label>
					                                Address 2
					                                <input name="address2" type="text" placeholder="Enter Your Second Address" value="<?php echo $contact->address2; ?>"/>
					                            </label>
					                        </div>
					                    </div>
					                    
					                    <div class="row">
					                        <div class="large-4 columns">
					                            <label>
					                                City
					                                <input name="city" type="text" placeholder="Enter Your City" value="<?php echo $contact->city; ?>"/>
					                            </label>
					                        </div>
					                        <div class="large-4 columns">
					                            <label>
					                                State
					                                <input name="state" type="text" placeholder="Enter Your State" value="<?php echo $contact->state; ?>"/>
					                            </label>
					                        </div>
					                        <div class="large-4 columns">
					                            <label>
					                                Zipcode
					                                <input name="zipcode" type="text" placeholder="Enter Your Zipcode" value="<?php echo $contact->zipcode; ?>"/>
					                            </label>
					                        </div>
					                    </div>
					                    
					                    <div class="row">
					                        <div class="large-12 columns">
					                            <label>
					                                Notes
					                                <textarea name="notes" placeholder="Enter Optional Notes"><?php echo $contact->notes; ?></textarea>
					                            </label>
					                        </div>
					                    </div>
									<input type="hidden" name="id" value="<?php echo $contact->id; ?>"/>
					                <input name="submit" type="submit" class="add-btn button right" value="Submit" />
					                <a class="close-reveal-modal">&#215;</a>
					                </form>
                            	</div>
                            </li>
                            <li>
                            	<form id="deleteContact" action="#" method="post" >
                            		<input type="hidden" name="id" value="<?php echo $contact->id; ?>" />
                            		<input type="submit" class="delete-btn button tiny secondary alert" value="Delete" />
                            	</form>
                            </li>
                        </ul>
                    </td>
                </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>