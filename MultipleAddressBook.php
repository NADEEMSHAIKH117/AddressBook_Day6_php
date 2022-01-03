<?php
include 'AddressBook.php';
class MultipleAddressBook
{
    public $array;
    public $addressBook;

    public function __construct()
    {
        $this->addressBook = new AddressBook();
        $this->array = [];
    }
    public function addAddressBook()
    {
        $bookName = readline("Enter Name of new Address Book: " . "\n");
        if (array_key_exists($bookName, $this->array)) {
            echo "Address Book With this name exists, Enter new name.";
            $this->addAddressBook();
        } else {
            $this->array[$bookName] = NULL;
            $newBook = readline("press 1 if you want to add another book or press any Key to exit.");
            if ($newBook == 1) {
                $this->addAddressBook();
            }
        }
    }

    public function addContact()
    {
        $newContact = readline("Enter the name of Address book to add the contact : ");
        $number = readline("Enter the number of contacts you want to enter : ");
        if(array_key_exists($newContact, $this->array)) {
            for($i = 0; $i < $number; $i++) {
                $firstName = readline("Enter First Name : ");
                foreach($this->array as $key => $values) {
                    if($key == $newContact) {
                        if($values == NULL) {
                            $this->array[$newContact][$i] = $this->addressBook->addNewContact($firstName);
                            break;
                        }
                        for($j = 0; $j < $number; $j++) 
                        if($firstName == $values[$j]->getFirstName()) {
                            echo "The entered person is already exist.\n";
                            $i--;
                            break;
                        } else {
                            $this->array[$newContact][$i] = $this->addressBook->addNewContact($firstName);
                            echo "Contact added successfully. \n";
                            break;
                        }
                    }
                }
                
            }
        } else {
            echo "No book found\n";
        }
    }
    public function editContactInBook(){
        $editBookName = readline("Enter Name of Address book you want to edit: "."\n");
        $editName = readline("Enter the First name of person to edit contact: "."\n");
        $edited = false;
        if(array_key_exists($editBookName,$this->array)) {
            foreach($this->array as $key => $values) {
                for($i=0; $i < count($values); $i++){
                    $person = $values[$i];
                    if($editName == $person->getFirstName()){
                        $this->array[$key][$i] = $this->addressBook->editContact($values[$i]);
                        $edited = true;
                    }
                }
            }
        } else {
            echo "AddressBook doesn't exist, Please enter correct name.";
            $this->editContactInBook();
        }
        if ($edited == false) {
            echo "This name does not exist";
            $this->editContactInBook();
        }
    }
    public function deleteAddressBook() {
        $bookName = readline("Enter Name of Address Book you want to delete: ");
        if(array_key_exists($bookName, $this->array)) {
            unset($this->array[$bookName]);
        } else {
            echo "AddressBook doesn't exist, Please enter correct name.";
            $this->deleteAddressBook();
        }
    }

    public function deleteContactInBook() {
        $bookName = readline("Enter Name of Address Book you want to delete the contacts in it: ");
        $deleteName = readline("Enter the first name of person to delete contact");
        if(array_key_exists($bookName, $this->array)) {
            foreach($this->array as $key => $values) {
                for($i = 0; $i < count($values); $i++) {
                    $person = $values[$i];
                    if($deleteName == $person->getFirstName()) {
                        unset($this->array[$key][$i]);
                        //$this->array = array_values($this->array);
                    }
                }
            }
        }
    }
    public function printContact() {
        $bookName = readline("Enter Name of Address Book");
        foreach($this->array as $key => $values) {
            if($key == $bookName) {
                echo $key . " Address Book :\n";
                foreach($values as $contact) {
                    echo $contact;
                }
            }else {
                echo "Address Book Not Found :\n";
            }
            
        }
    }

    public function searchPersonByCity($cityName) {
        foreach($this->array as $key => $values) {
            for($i = 0; $i < count($values); $i++) {
                if($cityName == $values[$i]->getCity()) {
                    echo "Address Book : " . $key . "\n";
                    echo "First Name : " . $values[$i]->getFirstName() . "\n";
                    echo "Last Name : " . $values[$i]->getLastName() . "\n";
                    echo "\n";
                }
            }
        }
    }

    public function searchPersonByState($stateName) {
        foreach($this->array as $key => $values) {
            for($i = 0; $i < count($values); $i++) {
                if($stateName == $values[$i]->getState()) {
                    echo "Address Book : " . $key . "\n";
                    echo "First Name : " . $values[$i]->getFirstName() . "\n";
                    echo "Last Name : " . $values[$i]->getLastName() . "\n";
                    echo "\n";
                }
            }
        }
    }
    public function contactsCount($name) {
        $count = 0;
        foreach($this->array as $key => $values) {
            for($i = 0; $i < count($values); $i++) {
                if($name == $values[$i]->getState() || $name == $values[$i]->getCity()) {
                    $count++;
                }
            }
        }
        return $count;
    }
}
?>
