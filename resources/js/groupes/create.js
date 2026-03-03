import $ from "jquery";
window.$ = window.jQuery = $;

$("#annee").on("change", function (e) {
    e.preventDefault();
    const annee = Number($("#annee").val());
    let optionFiliers = $("#filiere_id");
    optionFiliers.empty();
    optionFiliers.append(
        '<option disabled value="" selected>choisir une filiers</option>',
    );
    $.get(`/filieres/option/${annee}`, function (data, status) {
        data.forEach(({ id, nom, option }) => {
            if (option !== null) {
                optionFiliers.append(`
                     <option value="${id}">${nom}  option: ${option}</option>
                 `);
            } else {
                optionFiliers.append(`
                     <option value="${id}">${nom}</option>
                 `);
            }
        });
    });
});
