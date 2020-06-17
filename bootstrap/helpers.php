<?php

use App\User;
const APPNAME = 'Tirupati Finance';
const GSTNO = '23BVPPB930101Z8';
const CAST = [
    1 => 'OBC',
    2 => 'GENERAL',
    3 => 'SC',
    4 => 'ST',
    5 => 'EWS',
    6 => 'SBC',
    7 => 'VJ-A',
    8 => 'NT-B',
    9 => 'NT-C',
    10 => 'NT-D',
    11 => 'Other'
];
const VEHICLETYPE = [
    1 => '2 Wheeler',
    2 => '4 Wheeler',
];
const INTEREST = [
    1 => '1.50',
    2 => '0.70',
];
const PAYSTATUS = [
    0 => 'Pending',
    1 => 'Complete',
    2 => 'Pending for approve'
];

const PAYMENTSTATUS = [
    0 => 'Progress',
    1 => 'Fail',
    2 => 'Successful'
];

const PENALTYMONTH = '500';
const PENALTY = "10";

const GENDER = [
    1 => 'Male',
    2 => 'Female',
    3 => 'Other'
];
const RELIGION = [
    1 => 'Hindu',
    2 => 'Islam',
    3 => 'Cristian',
    4 => 'Buddhist',
    5 => 'Other',
];

const MARITALSTATUS = [
	1 => 'Single',
	2 => 'Married',
	3 => 'Widowed',
	4 => 'Divorced',
];

const RESIDENTALSTATUS = [
	1 => 'Home Owner',
	2 => 'Renting',
	3 => 'Living with parents',
	4 => 'Other',
];

const OFTENPAID = [
	1 => 'Monthly',
	2 => 'Fortnightly',
	3 => 'Weekly',
	4 => 'Other'
]; 

const BLOOD_GROUP = [
    1 => 'A+',
    2 => 'O+',
    3 => 'B+',
    4 => 'AB+',
    5 => 'A-',
    6 => 'O-',
    7 => 'B-',
    8 => 'AB-',
];
const STATUS = [
    'A' => 'Active',
    'P' => 'Pending',
    'S' => 'Suspend',
];
const LOANSTATUS = [
    1 => 'Running',
    2 => 'Complete',
];
const PAYMENTMODE = [
    1 => 'Cash',
    // 2 => 'Cheque',
    2 => 'NEFT',
    // 4 => 'Credit'
];
const LOANTYPE = [
	1 => 'Personal Loan',
	2 => 'Bussiness Loan',
	3 => 'Home Loan',
	4 => 'Auto Loan',
	5 => 'Student Loan' 
]; 

if (!function_exists('list_global_tags')) {
  function list_global_tags($tag)
  {
    return "hello";
  }
}
?>