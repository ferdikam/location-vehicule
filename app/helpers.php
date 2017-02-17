<?php
function status($title)
{
    switch ($title)
    {
        case "pending":
            echo "En attente de paiement";
            break;
        case "paid":
            echo "Payé";
            break;
    }
}