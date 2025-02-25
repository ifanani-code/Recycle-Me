<?php
class NotificationManager {
    public static function setAlert($type, $message) {
        $_SESSION["alert"] = [
            "type" => $type,
            "message" => $message
        ];
    }

    public static function getAlert() {
        if (isset($_SESSION["alert"])) {
            $alert = $_SESSION["alert"];
            unset($_SESSION["alert"]);
            return '<div class="alert ' . $alert['type'] . '">' . $alert['message'] . '<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
        } else {
            return NULL;
        }
    }
}
?>