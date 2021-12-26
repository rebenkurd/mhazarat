<?php


function SuccessMessage()
{
    if (isset($_SESSION['SuccessMessage'])) {
        $Output = '<div class="alert alert-success text-center" role="alert">';
        $Output .= htmlentities($_SESSION['SuccessMessage']);
        $Output .= '</div>';
        $_SESSION['SuccessMessage'] = null;
        return $Output;
    }
}

function ErrorMessage()
{
    if (isset($_SESSION['ErrorMessage'])) {
        $Output  = '<div class="alert alert-danger text-center role="alert"">';
        $Output .= htmlentities($_SESSION['ErrorMessage']);
        $Output .= '</div>';
        $_SESSION['ErrorMessage'] = null;
        return $Output;
    }
}



?>