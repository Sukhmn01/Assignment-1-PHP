]<?php
class validate {

    // Check if required fields are empty
    public function checkEmpty($data, $fields) {
        $msg = '';
        foreach ($fields as $field) {
            if (empty(trim($data[$field]))) {
                $msg .= "<p>The <strong>$field</strong> field is empty.</p>";
            }
        }
        return $msg;
    }

    // Validate numeric grade
    public function validGrade($grade) {
        return preg_match("/^[0-9]+$/", $grade);
    }

    // Validate email format
    public function validEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
?>