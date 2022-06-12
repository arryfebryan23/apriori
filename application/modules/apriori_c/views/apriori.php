<div class="row">

    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Perhitungan Apriori</h4>
                <form method="post" id="form-apriori">
                    <div class=" form-group row">
                        <div class="col-sm-6">
                            <label for="example-text-input" class="col-form-label">Minimal Support</label>
                            <input type="text" inputmode="numeric" pattern="[-+]?[0-9]*[.]?[0-9]+" class="form-control" placeholder="Minimal support" name="support" autocomplete="off" value="0.3" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="example-text-input" class="col-form-label">Minimal Confidence</label>
                            <input type="text" inputmode="numeric" pattern="[-+]?[0-9]*[.]?[0-9]+" class="form-control" placeholder="Minimal Confidence" name="confidence" autocomplete="off" value="0.8" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="example-text-input" class="col-form-label">Tanggal Awal</label>
                            <input type="date" class="form-control" placeholder="Tanggal Awal" name="start_date" value="23/02/1999">
                        </div>
                        <div class="col-sm-6">
                            <label for="example-text-input" class="col-form-label">Tanggal Akhir</label>
                            <input type="date" class="form-control" placeholder="Tanggal Akhir" name="end_date" value="23/02/2023">
                        </div>
                    </div>
                    <button class="btn btn-primary" id="button" type="submit">Hitung</button>
                </form>
            </div>
        </div>
    </div>

    <style>
        .no-border {
            border: 0px solid black !important;
        }
    </style>
    <div class="col-lg-12 mt-4" id="card-apriori">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Hasil Perhitungan Apriori</h4>
                <span id="loader-gif">
                    <center>
                        <img src="<?= base_url('assets/images/loader.gif') ?>" alt="loading">
                    </center>
                </span>
                <div id="hasil-content">
                    <!-- BEGIN : FILTER APRIORI -->
                    <table class="no-border">
                        <tr>
                            <td class="no-border">Minimal Support</td>
                            <td class="no-border text-center" width="20px">:</td>
                            <td class="no-border" id="support"></td>
                        </tr>
                        <tr>
                            <td class="no-border">Minimal Confidence</td>
                            <td class="no-border text-center">:</td>
                            <td class="no-border" id="confidence"></td>
                        </tr>
                        <tr>
                            <td class="no-border">Tanggal Awal</td>
                            <td class="no-border text-center">:</td>
                            <td class="no-border" id="start_date"></td>
                        </tr>
                        <tr>
                            <td class="no-border">Tanggal Akhir</td>
                            <td class="no-border  text-center">:</td>
                            <td class="no-border" id="end_date"></td>
                        </tr>
                    </table>
                    <!-- END : FILTER APRIORI -->

                    <!-- BEGIN : DATASET TERPILIH -->
                    <hr>
                    <h4 class="header-title">Dataset Terpilih</h4>
                    <div class="data-tables">
                        <table id="myTable" class="text-center" width="100%">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th scope="col">ID Transaksi</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nomor Telp</th>
                                    <th scope="col">Tanggal Transaksi</th>
                                    <th scope="col">Layanan/Produk</th>
                                </tr>
                            </thead>
                            <tbody id="sample-apriori">

                            </tbody>
                        </table>
                    </div>
                    <!-- END : DATASET TERPILIH -->

                    <!-- BEGIN : ASOSIASIN FINAL  -->
                    <hr>
                    <h4 class="header-title">Asosiasi Final</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-bordered  table-striped text-center">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Antecedent</th>
                                        <th scope="col">Consequent</th>
                                        <th scope="col">Support</th>
                                        <th scope="col">Confidence</th>
                                        <th scope="col">Support * Confidence</th>
                                    </tr>
                                </thead>
                                <tbody id="result-apriori">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END : ASOSIASI FINAL -->

                    <!-- BEGIN : FREQUENT -->
                    <span id="frequent-apriori">

                    </span>
                    <!-- END : FREQUENT -->
                </div>
            </div>
        </div>
    </div>
    <!-- normal alert area end -->
</div>

<script>
    $("#card-apriori").hide();
    $("#hasil-content").hide();
    $("#loader-gif").hide();

    var my_func = function(event) {
        event.preventDefault();
        $('#card-apriori').show();
        $('#loader-gif').show();
        $("#hasil-content").hide();
        $('#myTable').DataTable().destroy();

        $('#button').attr('disabled', true);

        setTimeout(function() {
            var form = $("#form-apriori");
            $.ajax({
                type: "POST",
                url: "<?= base_url('apriori_c/hitung') ?>",
                dataType: 'json',
                data: form.serialize(),
                success: function(response) {
                    console.log(response);
                    response.frequent = Object.keys(response.frequent)
                        .map(function(key) {
                            return response.frequent[key];
                        });

                    response.samples = Object.keys(response.samples)
                        .map(function(key) {
                            return response.samples[key];
                        });

                    let sample = create_row_sample(response.samples);
                    let result = create_row_hasil(response.result);
                    let frequent_apriori = create_frequent(response.frequent);

                    $('#support').html(response.support);
                    $('#confidence').html(response.confidence);
                    $('#start_date').html(response.start_date);
                    $('#end_date').html(response.end_date);

                    $('#sample-apriori').html(sample);
                    $('#result-apriori').html(result);
                    $('#frequent-apriori').html(frequent_apriori);
                },
                complete: function() {
                    $('#myTable').DataTable();
                    $("#hasil-content").fadeIn('slow');
                    $('#button').attr('disabled', false);
                    $('#loader-gif').hide();
                }
            });
        }, 1500);


    };

    var form = document.getElementById("form-apriori");

    function create_row_sample(samples) {
        let i = 1;
        let body = '';
        samples.map(function(row) {
            body += "<tr>";
            body += "<th scope='row'>" + row.id_transaksi + "</th>";
            body += "<td>" + row.nama + "</td>";
            body += "<td>" + row.no_telp + "</td>";
            body += "<td>" + row.tanggal + "</td>";

            // Begin Antecedet
            body += "<td>";
            let items = '';
            row.itemset.map(function(r) {
                items += r + ', ';
            });
            items = items.substring(0, items.length - 2);
            body += items;
            // End of Antecedet

            body += "</th>";
            i++;
        });

        return body;
    }


    function create_row_hasil(result) {
        let i = 1;
        let body = '';
        result.map(function(row) {
            body += "<tr>";
            body += "<th scope='row'>" + i + "</th>";

            // Begin Antecedet
            body += "<td>";
            let items = '';

            row.antecedent.map(function(r) {
                items += r + ', ';
            });
            items = items.substring(0, items.length - 2);
            body += items;
            // End of Antecedet

            // Begin Consequent
            body += "<td>";
            items = '';

            row.consequent.map(function(r) {
                items += r + ', ';
            });
            items = items.substring(0, items.length - 2);
            body += items;
            // End of Consequent

            body += "</td>";
            body += "<td>" + row.support + "</td>";
            body += "<td>" + row.confidence + "</td>";
            body += "<td>" + row.support * row.confidence + "</td>";
            body += "</th>";
            i++;
        });

        return body;
    }

    function create_frequent(frequent) {
        let i = 1;
        let body = "";

        frequent.map(function(row) {
            body += "<hr>";
            body += "<h4 class='header-title'>Iterasi " + i + "</h4>";
            body += "<div class='single-table'>";
            body += "    <div class='table-responsive'>";
            body += "        <table class='table table-bordered text-center'>";
            body += "            <thead class='text-uppercase'>";
            body += "                <tr>";
            body += "                    <th scope='col'>No</th>";
            body += "                    <th scope='col'>Itemset</th>";
            body += "                    <th scope='col'>Frequency</th>";
            body += "                    <th scope='col'>Support</th>";
            body += "                </tr>";
            body += "            </thead>";
            body += "            <tbody>";

            let j = 1;
            row.map(function(r) {
                body += "                <tr>";
                body += "                    <th scope='row'>" + j + "</th>";

                // Begin Itemset
                // let items = "";
                body += "<td>";
                items = '';

                r.itemset.map(function(val) {
                    items += val + ', ';
                });
                items = items.substring(0, items.length - 2);
                body += items;
                body += "</td>";
                // End of Itemset

                body += "                    <td>" + r.frequency + "</td>";
                body += "                    <td>" + r.support + "</td>";
                body += "                </tr>";
                j++;
            });
            body += "            </tbody>";
            body += "        </table>";
            body += "    </div>";
            body += "</div>";
            i++;
        })

        return body;
    }
    // attach event listener
    form.addEventListener("submit", my_func, true);
</script>