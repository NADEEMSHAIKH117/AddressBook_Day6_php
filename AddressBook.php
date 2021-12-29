<?php
class AddressBook
{
    public $firstName;
    public $lastName;
    public $address;
    public $city;
    public $state;
    public $emailID;
    public $zipCode;
    public $mobileNumber;

    public function printContact()
    {
        $this->firstName = "Nadeem";
        $this->lastName = "Shaikh";
        $this->address = "Dighi";
        $this->city = "Pune";
        $this->state = "Maharashtra";
        $this->emailID = "nadeemshaikh@gmail.com";
        $this->zipCode = "411015";
        $this->mobileNumber = "8208022703";

        echo "Contact Details : \n";
        echo "Name : " . $this->firstName . " " . $this->lastName . "\n"
            . "Address : " . $this->address . "\n"
            . "City : " . $this->city . "\n"
            . "State : " . $this->state . "\n"
            . "ZipCode : " . $this->zipCode . "\n"
            . "Mobile Number : " . $this->mobileNumber . "\n"
            . "Email Id : " . $this->emailID . "\n";
    }
}
$addressBook = new AddressBook();
$addressBook->printContact();
?>