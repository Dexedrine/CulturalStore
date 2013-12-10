var suggestUrl = $('#nom').attr('data-suggest');
$('#nom').typeahead({
    // suggestions pour une saisie d'au minimum 2 caractères
    minLength: 2,
 
    // nous configurons ici la source distante de données
    source: function(query, process) {
        // "query" est la chaîne de recherche
        // "process" est une closure qui doit recevoir la liste des suggestions à afficher
 
        var $this = this;
        $.ajax({
            url: suggestUrl,
            type: 'GET',
            data: {
                search: query,
            },
            success: function(data) {
                // les données que nous recevons sont de 3 types:
                //  "suggest" est la chaîne de caractères à afficher dans les suggestions
                //  "city" et "zipcode" sont les données que nous voulons utiliser pour
                //  remplir nos champs lors de la sélection d'une suggestion
 
                // ce tableau "reversed" conserve temporairement une relation entre chaque
                // suggestion, et ses données associées
                var reversed = {};
 
                // ici nous générons simplement la liste des suggestions à afficher
                var suggests = [];
 
                $.each(data, function(id, elem) {
                    reversed[elem.suggest] = elem;
                    suggests.push(elem.suggest);
                });
 
                $this.reversed = reversed;
 
                // affichage des suggestions
                process(suggests);
            }
        })
    },
 
    // cette méthode est appelée lorsque qu'une suggestion est sélectionnée depuis la liste
    updater: function(item) {
 
        // nous retrouvons alors les données associées
        var elem = this.reversed[item];
 
        // puis nous remplissons les champs "zipcode"...
        $('#prenom').val(elem.zipcode);
 
        // ...et "city" du formulaire
        return elem.city;
    },
 
    // cette méthode permet de déterminer lesquelles des suggestions sont valides par rapport
    // à la recherche. Nous effectuons déjà tout cela côté serveur, donc ici il suffit de
    // retourner "true"
    matcher: function() {
        return true;
    }
});