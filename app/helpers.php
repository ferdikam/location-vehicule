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

function format_date($value)
{
    // return $value->format('d M Y');
    return $value->formatLocalized('%A %d %B %Y');;
}