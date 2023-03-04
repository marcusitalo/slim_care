            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4" id="formShowDetails">
                            <h6 class="mb-4"><?php echo $data['subtitulo']; ?></h6>
                                <div class="mb-3">
                                    <label for="exampleInputday_start" class="form-label requered">Data de Entrada na SlimCarePalmasTO</label>
                                    <input type="date" class="form-control" id="exampleInputday_start" name="day_start" value="<?php echo $data['day_start']; ?>" required <?php echo $data['disabled']; ?>>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputday_end" class="form-label requered">Data de Saída na SlimCarePalmasTO</label>
                                    <input type="date" class="form-control" id="exampleInputday_end" name="day_end" value="<?php echo $data['day_end']; ?>" required <?php echo $data['disabled']; ?>>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPlace" class="form-label required">Nome</label>
                                    <input type="text" class="form-control" id="exampleInputPlace" name="patient_name" value="<?php echo $data['patient_name']; ?>" required <?php echo $data['disabled']; ?>>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPhone" class="form-label required">Número de Telefone</label>
                                    <input type="text" class="form-control" id="exampleInputPhone" name="patient_phone" value="<?php echo $data['patient_phone']; ?>" required <?php echo $data['disabled']; ?>>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputtype_of_surgery" class="form-label required">Tipo da Cirurgia</label>
                                    <input type="text" class="form-control" id="exampleInputtype_of_surgery" name="type_of_surgery" value="<?php echo $data['type_of_surgery']; ?>" required <?php echo $data['disabled']; ?>>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputlocation_of_surgery" class="form-label required">Local da Cirurgia</label>
                                    <input type="text" class="form-control" id="exampleInputlocation_of_surgery" name="location_of_surgery" value="<?php echo $data['location_of_surgery']; ?>" required <?php echo $data['disabled']; ?>>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputdate_of_surgery" class="form-label requered">Data da Cirurgia</label>
                                    <input type="date" class="form-control" id="exampleInputdate_of_surgery" name="date_of_surgery" value="<?php echo $data['date_of_surgery']; ?>" required <?php echo $data['disabled']; ?>>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputtime_of_surgery" class="form-label required">Horário da Cirurgia</label>
                                    <input type="time" class="form-control" id="exampleInputtime_of_surgery" name="time_of_surgery" value="<?php echo $data['time_of_surgery']; ?>" required <?php echo $data['disabled']; ?>>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputneed_caregiver" class="form-label required">Precisa de cuidador hospitalar</label>
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="need_caregiver" required <?php echo $data['disabled']; ?>>
                                        <option value="1" <?php if( $data['need_caregiver'] == "1" ): ?>selected="selected"<?php endif; ?> >Sim</option>
                                        <option value="0" <?php if( $data['need_caregiver'] == "0" ): ?>selected="selected"<?php endif; ?> >Não</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputguidance" class="form-label required">Orientações</label>
                                    <textarea type="text" class="form-control" id="exampleInputguidance" name="guidance" value="<?php echo $data['guidance']; ?>" required <?php echo $data['disabled']; ?>><?php echo $data['guidance']; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputdatasheet" class="form-label required">Ficha</label>
                                    <input type="text" class="form-control" id="exampleInputdatasheet" name="datasheet" value="<?php echo $data['datasheet']; ?>" required <?php echo $data['disabled']; ?>>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputcontract" class="form-label required">Contrato</label>
                                    <input type="text" class="form-control" id="exampleInputcontract" name="contract" value="<?php echo $data['contract']; ?>" required <?php echo $data['disabled']; ?>>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputobservation" class="form-label required">Observação</label>
                                    <textarea type="text" class="form-control" id="exampleInputobservation" name="observation" value="<?php echo $data['observation']; ?>" required <?php echo $data['disabled']; ?>><?php echo $data['observation']; ?></textarea>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="exampleInputamount" class="form-label required">Pagamento</label>
                                    <input type="number" class="form-control" id="exampleInputamount" name="amount" value="<?php echo $data['amount']; ?>" step='0.01' value='0.00' placeholder='0.00' required <?php echo $data['disabled']; ?>>
                                </div>    
                        </div>
                    </div>
                    
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
