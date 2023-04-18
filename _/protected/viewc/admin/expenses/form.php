<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4"><?php echo $data['subtitulo']; ?> </h6>
                <div class="row" id="modelExpenses">
                    <div class="col-xl-4">
                        <label for="exampleInputName" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="exampleInputName" list="list_supplier" name="supplier[]" value="" <?php echo $data['disabled']; ?>>
                    </div>
                    <div class="col-xl-4">
                        <label for="exampleInputamount" class="form-label required">Valor</label>
                        <input type="number" class="form-control" id="exampleInputamount" name="amount[]" value="" step='0.01' value='0.00' placeholder='0.00' required <?php echo $data['disabled']; ?>>
                    </div>
                    <div class="col-xl-3">
                        <label class="form-label"></label>
                        <button type="button" class="form-control btn btn-primary m-2 btnRemoveExpenses">Remover</button>
                    </div>
                </div>
                <form action='<?php echo $data['action']; ?>' method='POST'>
                    <div class="mb-3">
                        <label for="exampleInputday_expenses" class="form-label required">Data da despesas</label>
                        <input type="date" class="form-control" id="exampleInputday_expenses" name="day_expenses" value="<?php echo $data['day_expenses']; ?>" required <?php echo $data['disabled']; ?>>
                    </div>
                    <span> <button type="button" class="btn btn-primary m-2" id="btnAddExpenses">Adicionar nova despesa</button></span>
                    <div id="listExpenses">
                        <?php echo $data['suppliers']; ?>
                    </div>
                    <div class="mb-3" style="height: 20px;"></div>
                    <div class="mb-3">
                        <input name="id" type="hidden" value="<?php echo $data['day_expenses']; ?>" />
                        <button type="submit" class="btn btn-primary" style="text-transform: capitalize;"><?php echo $data['acao']; ?></button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <?php echo $data['datalist']; ?>

    <script>
        if (window.addEventListener) // W3C standard
        {
            window.addEventListener('load', initFormUpdate, false); // NB **not** 'onload'
        } 
        else if (window.attachEvent) // Microsoft
        {
            window.attachEvent('onload', initFormUpdate);
        }
    
        function initFormUpdate(){    
            $(".btnRemoveExpenses").click(function(){
                $(this).parent().parent().remove()
            })
            $("#modelExpenses").hide()
            $("#btnAddExpenses").click(function (event) {
                clone = $("#modelExpenses").first().clone();
                clone.show()
                $("#listExpenses").append(clone);
                $(".btnRemoveExpenses").click(function(){
                    $(this).parent().parent().remove()
                })
            });
           
        }
    </script>
</div>