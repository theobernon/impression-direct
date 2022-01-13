<tr>
    <td>{{$commande->noCommande}}</td>
    <td>{{$commande->entCli}}</td>
    <td>{{$commande->pxttc}}</td>
    <td>{{$commande->mpaiement}}</td>
    <td>{{$commande->dateCommande}}</td>
    <td>
        <x-check :value="$commande->valClient " url=''>
        </x-check>
    </td>
    <td>
        <x-check :value="$commande->validee" url=''>
        </x-check>
    </td>
    <td>
        <x-check :value="$commande->expediee" url=''>
        </x-check>
    </td>
    <td>{{$commande->dateExpd}}</td>    
</tr>