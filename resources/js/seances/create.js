$(".schedule-cell").on("click", function () {
    // data set value
    const jour = $(this).data("jour");
    const creneau = $(this).data("creneau");

    // inputs
    $("#jourInput").val(jour);
    $("#creneauInput").val(creneau);
});

$("#seance_groupe").on("change", function () {
    let id = $(this).val();
    window.location = `/seances?groupeId=${id}`;
});

const params = new URLSearchParams(window.location.search);
const groupeId = params.get("groupeId");
if (groupeId) {
    $("#groupe_id").val(groupeId);
    $("#seance_groupe").val(groupeId);
}
console.log($("#groupeId").val());

$("#exportPdf").click(function () {
    const element = document.getElementById("planning");
    html2pdf()
        .from(element)
        .set({
            margin: 0.5,
            filename: "emploi_du_temps.pdf",
            html2canvas: { scale: 2 },
            jsPDF: { unit: "in", format: "a4", orientation: "landscape" },
        })
        .save();
});
