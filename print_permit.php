<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #03A9F5;
    box-shadow: 0 2px 8px 0 rgba(0, 0, 0, 0.2);
    text-align:center;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    /*float: left;*/
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    width: 24%;
     border-bottom: 3px solid transparent;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: green;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: lightgreen;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
body {
    font-size: 15px;
}
input, select, textarea {
  width: 100%;
  display: block;/*optionnal*/
  margin-bottom: 1rem;
}
.form-rounded {
border-radius: 1rem;
}
.hr-sect {
    display: flex;
    flex-basis: 100%;
    align-items: center;
    color: green;
    font-weight: bold;
    margin: 8px 0px;
}
.hr-sect:before,
.hr-sect:after {
    content: "";
    flex-grow: 1;
    background: rgba(0, 0, 0, 0.35);
    height: 1px;
    font-size: 0px;
    line-height: 0px;
    margin: 8px 0px;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  margin-bottom: 1rem;
  padding: 5px;
}
input[type="checkbox"]:enabled:checked {
        accent-color: lightgreen !important;
        color: white;
    }
li {
    margin-bottom: 2rem;
    text-align: justify;
    text-justify: inter-word;
}
</style>

<div class="content-wrapper">

    <div id="printableArea">
        <div class="row" style='margin: 0 auto; width:90%; border: 2px black solid;padding-left: 3rem; padding-right: 3rem;'>

            <div class="col-sm-2" style='text-align:center; margin-top:3rem; margin-left:-2rem;margin-right:2rem;'>    
                <img src="<?php echo base_url()."assets/"; ?>denr-logo.png" width='150px' height='150px' alt="Logo" class="brand-image " />
            </div>
            <div class="col-sm-10" style='text-align:center; margin-top:4rem'>
                <div><h4><b>DEPARTMENT OF ENVIRONMENT AND NATURAL RESOURCES - NCR</b></h4></div>
                <div><h3><b>PREFORMATTED APPLICATION FOR TREE-CUTTING, EARTH-BALLING, AND/OR PRUNING PERMIT</b></h3></div>
            </div>
        
            <div class="col-sm-12" style='margin-top:2rem;'>
                <div style='float:right;'>
                    <div class="row" style="float:right;">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-3">
                            <b>LPDD C/B/P Permit No.</b>
                        </div>
                        <div class="col-sm-3" style="text-align:center">
                            <b>
                                <?php 
                                    // echo $application_edit['reference_no']; 
                                    $reco_type=0;
                                    $reco_type_cut = 0;
                                    $reco_type_ball = 0;
                                    $reco_type_prune = 0;
                                    $prio = 0;
                                    $reco_type_palm = 0;
                                    // $reco_type_dead = 0;

                                    foreach($narrative_report_list as $nrl){
                                        if($application_edit['id'] == $nrl['app_id']){
                                            // type of conditions
                                            if($nrl['recommendation_action'] == 'CUT'){
                                                $reco_type_cut=1;
                                            }
                                            if($nrl['recommendation_action'] == 'BALL'){
                                                $reco_type_ball=1;
                                            }
                                            if($nrl['recommendation_action'] == 'PALM TREE'){
                                                $reco_type_palm=1;
                                            }
                                            if($nrl['recommendation_action'] == 'PRUNE' || $nrl['recommendation_action'] == 'RETAIN'){
                                                $reco_type_prune=1;
                                            }
                                            if($application_edit['priority'] == 'yes'){
                                                $prio = 1;
                                            } 
                                            // if($nrl['recommendation_action'] == 'DEAD'){
                                            //     $reco_type_dead=1;
                                            // }
                                        }
                                    }
                                    
                                    if($application_edit['priority'] == 'yes'){
                                        $prio = 1;
                                    } 

                                    // type of conditions
                                    if($reco_type_cut == 1 AND $reco_type_ball == 0){
                                        if($application_edit['within_property']=='outside' || $application_edit['within_property']=='both'){
                                            $ptype = 'TCP';
                                        }else{
                                            if($application_edit['nr_premium'] == 'yes'){
                                                $ptype = 'SPLTP';
                                            }else{
                                                $ptype = 'PLTP';
                                            }
                                        }
                                    }elseif($reco_type_cut == 0 AND $reco_type_ball == 1){
                                        $ptype = 'TEBP';
                                    }elseif($reco_type_cut == 1 AND $reco_type_ball == 1){
                                        if($application_edit['within_property']=='within'){
                                            if($application_edit['nr_premium'] == 'no'){
                                                $ptype = 'PLTEBP';
                                            }else{
                                                $ptype = 'SPLTEBP';
                                            }
                                        }else{
                                            $ptype = 'TCEBP';
                                        }
                                    }elseif($reco_type_prune == 1){
                                        $ptype = 'TPP';
                                    }elseif($prio == 1){
                                        $ptype = 'STCP';
                                    }
                                    else{
                                        $ptype = 'TCP';
                                    }
                                ?>
                                <?php echo $application_edit['date_applied'].'-'.$ptype.'-'.$application_edit['id']; ?>
                                <input type="hidden" name='reference_no_new' id='reference_no_new' value='<?php echo $application_edit['date_applied'].'-'.$ptype.'-'.$application_edit['id']; ?>'>
                                <input type="hidden" value='<?php echo $application_edit['id']; ?>'>
                            </b>
                        </div>

                        <div class="col-sm-6"></div>
                        <div class="col-sm-3">
                            <b>Date Approved:</b>
                        </div>
                        <div class="col-sm-3" style="text-align:center">
                        <?php echo date('F j, Y', strtotime($application_edit['date_approved'])); ?>
                        </div>

                        <div class="col-sm-6"></div>
                        <div class="col-sm-3">
                            <b>Date Released:</b>
                        </div>
                        <div class="col-sm-3" style="text-align:center">
                        <?php echo date('F j, Y', strtotime($application_edit['date_approved'])); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12" style='text-align:center;margin-top:2rem;'>
                <div><h3><b>
                    <?php 
                    
                    $reco_type=0;
                    $reco_type_cut = 0;
                    $reco_type_ball = 0;
                    $reco_type_palm = 0;
                    $reco_type_prune = 0;
                    $reco_type_dead = 1;
                    

                    foreach($narrative_report_list as $nrl){
                        if($application_edit['id'] == $nrl['app_id']){
                            // type of conditions
                            if($nrl['recommendation_action'] == 'CUT'){
                                $reco_type_cut=1;
                            }
                            if($nrl['recommendation_action'] == 'BALL'){
                                $reco_type_ball=1;
                            }
                            if($nrl['recommendation_action'] == 'PALM TREE'){
                                $reco_type_palm=1;
                            }
                            if($nrl['recommendation_action'] == 'PRUNE' || $nrl['recommendation_action'] == 'RETAIN'){
                                $reco_type_prune=1;
                            }
                            if($nrl['recommendation_action'] != 'DEAD'){
                                $reco_type_dead=0;
                            }
                        }
                    }

                    // type of conditions
                    if($reco_type_cut == 1 AND $reco_type_ball == 0){
                        if($application_edit['within_property']=='outside' || $application_edit['within_property']=='both'){
                            echo 'TREE CUTTING PERMIT';
                        }else{
                            if($application_edit['nr_premium'] == 'yes'){
                                echo 'SPECIAL PRIVATE LAND TIMBER PERMIT';
                            }else{
                                echo 'PRIVATE LAND TIMBER PERMIT';
                            }
                        }
                    }elseif($reco_type_cut == 0 AND $reco_type_ball == 1){
                        echo 'TREE EARTH BALLING PERMIT';
                    }elseif($reco_type_cut == 1 AND $reco_type_ball == 1){
                        if($application_edit['within_property']=='within'){
                            if($application_edit['nr_premium'] == 'no'){
                                echo 'PRIVATE LAND TIMBER AND EARTH BALLING PERMIT';
                            }else{
                                echo 'SPECIAL PRIVATE LAND TIMBER AND EARTH BALLING PERMIT';
                            }
                        }else{
                            echo 'TREE CUTTING AND EARTH BALLING PERMIT';
                        }
                    }elseif($reco_type_prune == 1){
                        echo 'TREE PRUNING PERMIT';
                    }elseif($prio == 1){
                        echo 'SPECIAL TREE CUTTING PERMIT';
                    }
                    // elseif($reco_type_dead==1){
                    //     echo 'TREE CUTTING PREMIT';
                    // }
                    // if($application_edit['permit_type'] == 'tcp'){
                    //     if($application_edit['within_property'] == 'within'){
                    //         if($application_edit['nr_premium'] == 'yes'){
                    //             echo 'SPECIAL PRIVATE LAND TIMBER PERMIT';
                    //         }else{
                    //             echo 'PRIVATE LAND TIMBER PERMIT';
                    //         }
                    //     }else{
                    //         echo 'TREE CUTTING PERMIT';
                    //     }
                    // }elseif($application_edit['permit_type'] == 'tebp'){
                    //     echo 'TREE EARTH BALLING PERMIT';
                    // }elseif($application_edit['permit_type'] == 'tpp'){
                    //     echo 'TREE PRUNING PERMIT';
                    // }elseif($application_edit['permit_type'] == 'stebp'){
                    //     echo 'SPECIAL TREE CUTTING / EARTH BALLING PERMIT';
                    // }
                    ?>
                </b></h3></div>
            </div>


            <div class="col-sm-12" style='margin-top:2rem;'>
                <input type="hidden" name="app_id" value="<?php echo $application_edit['id']; ?>">
                <input type="hidden" name="crs_id" value="<?php echo $application_edit['crs_id']; ?>">
                <p>
                    <!-- Client Info -->
                    <?php 
                        // client info from dniis
                        $crs_id = $application_edit['crs_id']; 
                        foreach($user_list as $ul){
                            if($ul['id'] == $crs_id){
                                $client_name = $ul['name'];
                                $client_address = $ul['address'];
                            }
                        }
                        
                        // if owner
                        if($application_edit['owner'] == 'Representative'){
                            if($application_edit['company_id'] == 30 || $application_edit['company_id'] == 17 || $application_edit['company_id'] == 184){
                                $ownership = 'represented by AQUINO , JORJETTE BARRENECHEA';
                            }else{
                                $ownership = 'represented by '.$client_name;
                            }
                        }else{
                            $ownership = '';
                        }

                        // if safety or development
                        if($application_edit['purpose'] == 'development'){
                            $safety = 'for property development';
                        }elseif($application_edit['purpose'] == 'safety'){
                            $safety = 'as a precaution from hazards and property damage';
                        }else{
                            $safety = 'for property development and as a precaution from hazards and property damage';
                        }
                        // if within private property
                        if($application_edit['within_property'] == 'within'){
                            $property = 'within the titled/private property';
                        }elseif($application_edit['within_property'] == 'outside'){
                            $property = 'on the '.$application_edit['within_property_others'];
                        }else{
                            $property = 'within and outside';
                        }
                    ?>

                    <?php 
                        foreach ($special_narrative as $snr):
                            if ($snr['app_id'] == $application_edit['id']):
                                $seedlings = $snr['no_trees'] * 100;
                                $seedlingsInWords = (new NumberFormatter("en", NumberFormatter::SPELLOUT))->format($snr['no_trees']);
                                $seventyPercentSeedlings = $seedlings * 0.70; 
                                $thirtyPercentSeedlings = $seedlings * 0.30; 
                                $project_name = $snr['proj_name'];
                            endif;
                        endforeach;

                        if($application_edit['within_subdivision'] == 'within'){
                            $wsub = 'Barangay and Homeowners Association';
                        }else{
                            $wsub = 'Barangay';
                        }
                    ?>

                    <div style="font-size: 20px">
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This PERMIT is issued to <b><?php echo $application_edit['estab_name']; ?></b> <?php echo $ownership; ?> with address located at <?php echo ucwords($client_address); ?>
                        purposely <?php echo $safety; ?>.</p>

                        <p>This PERMIT shall be strictly implemented subject to the following conditions:</p>
                        <?php if($prio == 1):?>
                            <?php foreach($special_narrative as $snr):?>
                                <?php if($application_edit['id'] == $snr['app_id']):?>
                                    <ol>
                                        <li>
                                             That only the <?php echo $seedlingsInWords;?> (<?php echo $snr['no_trees']?>) trees to be affected by 
                                            the <?php echo $project_name; ?> 
                                            <?php if($application_edit['within_proj_area'] == 'within'):?> 
                                                within the <?php echo $application_edit['tree_address'];?>
                                            <?php else:?>
                                                in <?php echo $application_edit['tree_address'];?>
                                            <?php endif;?>
                                            authorized to be cut .
                                        </li>
                                        <li>
                                            There shall be a total of <i><b><?php echo $seedlings;?> seedlings</b></i> as replacements for the trees to be cut 
                                            pursuant to DENR Memorandum Order No. 2012-02 otherwise known as the “Uniform Replacement 
                                            Ratio for Cut or Relocated Trees”. Said replacements shall be composed of 70% hardened 
                                            indigenous seedlings and 30% ornamental plants.</br></br>
                                            
                                            The 70% hardened indigenous species (<?php echo $seventyPercentSeedlings;?> seedlings) shall be planted by the permittee in the designated site
                                            within the La Mesa Watershed Reservation (Site Code - <?php echo $snr['seedling_replacement'];?>) 
                                            and on determined planting schedule. That the permittee shall ensure survival of planted indigenous 
                                            species following DENR standards on Maintenance and Protection of established plantations following 
                                            FMB Technical Bulletin No. 10. Said planting shall be validated by DENR-NCR.</br></br>

                                            The 30% ornamental plants (<?php echo $thirtyPercentSeedlings;?> seedlings) shall be coordinated with the Chief, Conservation 
                                            and Development Division (CDD) or his/her duly authorized representative with Telephone No. 0920-979-5920 
                                            loc 2413 on the kind of species as may be required by DENR-NCR for Urban Greening/Landscaping and shall inform 
                                            the same one (1) day before the scheduled delivery of seedlings.

                                        </li>
                                        <li>
                                            A Certificate Fee of P 50.00 shall be paid by the permittee for the Certificate of Compliance to be issued, 
                                            duly signed by the Chief, Conservation and Development Division, copy furnished to the undersigned.
                                        </li>
                                        <li>
                                            <?php if($reco_type_dead == 1 && $reco_type_palm== 1 && $reco_type_prune == 0 && $reco_type_ball == 0 && $reco_type_cut == 0){?>
                                            <?php }else{?>
                                                    
                                                The permittee shall pay the forest charges for the equivalent volume of the <?php echo $snr['no_trees']?> naturally grown
                                                trees to be determined after the conduct of tree cutting pursuant to Department Administrative Order 
                                                No.2021-11 known as the “Guidelines in the Processing and Issuance of Permits for the Cutting, 
                                                Removal and Relocation of Naturally Growing Trees”.
                                            <?php } ?>
                                        </li>
                                        <li>
                                        	In accordance with the issued Environmental Compliance Certificate (ECC), <?php echo $snr['ecc_cnc_condition'];?>. Furthermore, the permittee 
                                            shall also implement a greening program in line with the DENR’s thrust for GHG emission reduction program. 
                                        </li>
                                        <li>
                                            A billboard with a dimension of 4’ x 8’ shall be installed conspicuously within the area to inform the public that the cutting 
                                            operation thereat is covered with a permit issued by DENR.  Such notice of particulars shall indicate the name of the permittee and the 
                                            purpose of the activities to be undertaken. Likewise, the <?php echo  $wsub; ?> concerned shall be furnished with a copy of the permit prior to the 
                                            said operation;.
                                        </li>
                                        <li>
                                            In case a National Greening Program (NGP) site will be affected by the project, 
                                            the permittee shall coordinate with the DENR through the Chief, Conservation 
                                            and Development Division with Telephone No.  0920-979-5920 local 2413 for 
                                            identification and assessment of the NGP relocation site free from further 
                                            development prior to replanting of NGP species affected, to include other 
                                            trees to be earth-balled. The permittee shall maintain and protect the 
                                            transplanted trees for a period of at least one (1) year. For transplanted 
                                            trees that will not survive within six (6) months, the permittee shall 
                                            replace preferably indigenous tree species at a ratio of 1:100 as prescribed 
                                            under DENR Memorandum Order No. 2012-02;
                                        </li>
                                        <li>
                                        	Only Chainsaw/s with a Certificate of Registration from DENR shall be used in the conduct of cutting 
                                            operation.
                                        </li>
                                        <li>
                                        	The DENR shall not be held responsible for any untoward incident that might occur during the 
                                            cutting operation. Issues that may arise from the cutting of trees shall 
                                            be addressed directly and solely by the permittee.
                                        </li>
                                        <li>
                                            The permittee shall be required to undertake measures during and after the tree-cutting operation
                                            to mitigate the negative impacts of the said activity within the locality and on the environment.
                                        </li>
                                        <li>
                                            <?php if($application_edit['within_subdivision'] == 'within'):?>
                                                The derivable wood materials to be recovered from the cut tree shall belong to the 
                                                <b><?php echo $application_edit['within_subdivision_others']; ?></b>. In case the wood materials will be transported by the permittee 
                                                outside Metro Manila, the same shall be covered by transport documents issued by the DENR;
                                            <?php else:?>
                                                "The derivable wood materials to be recovered from the cut tree shall be bucked into at least 2 meters in
                                                length and shall be delivered to DENR-NCR for safekeeping and proper disposition;"
                                            <?php endif;?>
                                        </li>
                                        <li>
                                        	Other necessary clearance/s pertaining/related to the project shall be secured from other concerned offices/agencies.
                                        </li>
                                        <li>
                                        	If necessary, the permittee shall file an extension of the permit issued ten (10) days prior to its expiry 
                                            date. Otherwise, he/she shall be required to apply for a new permit and submit another set of requirements.
                                        </li>
                                        <li>
                                        	A terminal report with pictures shall be submitted to this Office after the expiration of this permit or upon 
                                            completion of the cutting operation, whichever comes first.
                                        </li>
                                        <li>
                                        	Violation of any of the above conditions shall be sufficient ground for the cancellation/revocation of this 
                                            permit, without prejudice to the imposition of penalties of imprisonment and/or fine, under Presidential 
                                            decree Nos. 705 as amended (Revised Forestry Code) and/or P.D 953 (Requiring the Planting of Trees in 
                                            certain Places and Penalizing Unauthorized Cutting) and/or Republic Act No. 9175 (Chainsaw Act and their 
                                            implementing rules and regulations).
                                        </li>
                                        <li>
                                        	This permit has a validity of <b>120 days</b> upon receipt hereof or upon completion of the cutting operation, whichever comes first.
                                        </li>
                                    </ol>
                                <?php endif;?>
                            <?php endforeach;?>
                        <?php else:?>
                            <ol>
                                <?php if($reco_type_ball == 1 || $reco_type_cut == 1 || $reco_type_dead == 1):?>
                                <li>Only the tree/s <?php echo $property; ?> located at <?php echo $application_edit['tree_address']; ?> is/are authorized to be balled/cut/prune:</li>

                                <?php elseif ($reco_type_prune && !$reco_type_cut && !$reco_type_ball) : ?>
                                    <li>Only the following tree/s <?php echo $property; ?> located at <?php echo $application_edit['tree_address']; ?> is/are authorized to be regularly pruned:</li>
                                <?php else: ?>
                                    <li>Only the tree/s <?php echo $property; ?> located at <?php echo $application_edit['tree_address']; ?> is/are authorized to be balled/cut:</li>
                                <?php endif;?>
                                <table align="center" style="margin-top: 1rem; margin-bottom: 2rem; text-align:center">
                                    <tr>
                                        <th>No.</th>
                                        <th>Tree No.</th>
                                        <th>Species</th>
                                        <th>DBH (cm)</th>
                                        <th>MH (m)</th>
                                        <th>Gross Volume (cu. m.)</th>
                                        <th>Nature of Growth</th>
                                        <th>Recommendation</th>
                                    </tr>
                                        <?php 
                                            $cnt=0;
                                            $withnatural = 0;
                                            $total_gross_volume = 0;
                                            $seedling_replacement=0;
                                            $reco_type=0;
                                            $reco_type_cut = 0;
                                            $reco_type_ball = 0;
                                            $reco_type_prune = 0;
                                            foreach($narrative_report_list as $nrl) : ?>
                                            <?php 
                                                if($application_edit['id'] == $nrl['app_id']) : 
                                                    
                                                    // tree count
                                                    $cnt++; 

                                                    //with naturally grown tree
                                                    if($nrl['nog'] == 'Natural'){
                                                        $withnatural=1;
                                                    }

                                                    // type of conditions
                                                    if($nrl['recommendation_action'] == 'CUT'){
                                                        $reco_type_cut=1;
                                                    }
                                                    if($nrl['recommendation_action'] == 'BALL'){
                                                        $reco_type_ball=1;
                                                    }
                                                    if($nrl['recommendation_action'] == 'PRUNE' || $nrl['recommendation_action'] == 'RETAIN'){
                                                        $reco_type_prune=1;
                                                    }
                                                    if($nrl['recommendation_action'] != 'DEAD'){
                                                        $reco_type_dead=0;
                                                    }

                                                    // count of seedling replacement
                                                    if($nrl['recommendation_action'] == 'CUT'){
                                                        if($nrl['nog'] == 'Natural'){
                                                            $seedling_replacement += 100;
                                                        }elseif($nrl['nog'] == 'Planted'){
                                                            // condition for 100 seedling replacement
                                                            if($nrl['app_id'] == 29 OR $nrl['app_id'] == 75 OR $nrl['app_id'] == 52){
                                                                $seedling_replacement += 100;
                                                            }else{
                                                                $seedling_replacement += 50;
                                                            }
                                                        }
                                                    }

                                                    // homeowners
                                                    if($application_edit['within_subdivision'] == 'within'){
                                                        $wsub = 'Barangay and Homeowners Association';
                                                    }else{
                                                        $wsub = 'Barangay';
                                                    }

                                                    //validity
                                                    $total_gross_volume += $nrl['gross_volume'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo $nrl['tree_no']; ?></td>
                                                    <td><?php 
                                                            $phrase  = $nrl['common_name'];
                                                            $healthy = ["(",")"];
                                                            $yummy   = ["(<i>", "</i>)"];
                                                            $newPhrase = str_replace($healthy, $yummy, $phrase);
                                                            echo $newPhrase ?></td>
                                                    <td><?php echo $nrl['dbh']; ?></td>
                                                    <td><?php echo $nrl['mh']; ?></td>
                                                    <td><?php echo $nrl['gross_volume']; ?></td>
                                                    <td><?php echo $nrl['nog']; ?></td>
                                                    <td><?php echo $nrl['recommendation_action']; ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <tr >
                                            <th colspan=5>Total Gross Volume (cu.m.)</th>
                                            <th><?php echo $total_gross_volume; ?></th>
                                        </tr>
                                </table>
                            <?php if($reco_type_prune == 1 && $reco_type_ball == 0 && $reco_type_cut == 0 && $reco_type_dead == 0):?>
                                <li>
                                    The pruning operations shall be done by a firm/person(s) with appropriate expertise/experience to ensure that proper pruning shall be observed/undertaken to maintain the health and vigor of the trees and prevent tree death; 																									
                                </li>
                                <li>
                                    To coordinate with the Chief, Enforcement Division or the duly authorized representative with office address at DENR-NCR Technical Services, North Avenue, Quezon City with Telephone No. 0920-973-0301 loc 4206, prior to the conduct of pruning activities which is under the direct supervision of this Office;																									
                                </li>
                                <li>
                                    No further girdling and/or any damage will be caused on the trunk of the subject tree to avoid the death;																									
                                </li>
                                <li>
                                    Proper disposal of debris/waste pursuant to Republic Act 9003 or the “Ecological Solid Waste Management Act of 2000”; and																									
                                </li>
                                <li>
                                    To submit a report with photographs after the conduct of the pruning operation and for every succeeding tree pruning activity to be conducted for documentation.																									
                                </li>
                            <?php endif;?>
                            <?php if($reco_type_dead == 1 && $reco_type_prune == 0 && $reco_type_ball == 0 && $reco_type_cut == 0){?>
                                <li>To coordinate with the Barangay concerned prior to the cutting of the said tree;
                                </li>
                                <li>The cutting operation shall be done by a firm/person(s) with appropriate expertise to ensure public safety. You may likewise seek assistance from the Parks Development and Administrative Department (PDAD) of the Quezon City LGU for the actual conduct of the cutting activity thereof;</li>
                                <li>To properly dispose of the debris/waste from the cutting operation pursuant to Republic Act 9003 or the “Ecological Solid Waste Management Act of 2000”; and </li>
                                <li>Please submit a report with photographs to this Office after the conduct of the cutting operation.</li>
                            <?php }?>
                                        <?php
                                            // type of conditions
                                            if($reco_type_cut == 1 AND $reco_type_ball == 0){
                                                $reco_type='CUTTING';
                                            }elseif($reco_type_cut == 0 AND $reco_type_ball == 1){
                                                $reco_type='BALLING';
                                            }elseif($reco_type_cut == 1 AND $reco_type_ball == 1){
                                                $reco_type='CUTTINGBALLING';
                                            }elseif($reco_type_prune == 1){
                                                $reco_type='PRUNING';
                                            }

                                            // validity
                                            $validity=0;
                                            if($total_gross_volume >= 0 and $total_gross_volume <=50){
                                                $validity=50;
                                            }elseif($total_gross_volume <=51){
                                                $validity=60;
                                            }elseif($total_gross_volume <=71){
                                                $validity=90;
                                            }elseif($total_gross_volume <=101){
                                                $validity=120;
                                            }elseif($total_gross_volume >=201 and $total_gross_volume <=300){
                                                $validity=150;
                                            }
                                        ?>
                                <?php if($reco_type == 'CUTTING' OR $reco_type == 'CUTTINGBALLING') : ?>
                                    <?php if($application_edit['id'] == '109') : ?>

                                    <?php else:?>
                                        <li>There shall be a total of <span style='font-style: oblique'><b><?php echo  $seedling_replacement; ?> seedlings</b></span> 
                                            as replacements for the tree/s to be cut pursuant to DENR Memorandum Order No. 2012-02 otherwise known as the 
                                            <b>“Uniform Replacement Ratio for Cut or Relocated Trees”</b>. Said replacements shall be composed of 70% hardened indigenous 
                                            seedlings and 30% ornamental plants. That the permittee shall coordinate with the Chief, Conservation and Development Division (CDD) 
                                            or his/her duly authorized representative with Telephone No. <b>0920-979-5920 loc 2413</b> on the kind of species as may be required by 
                                            DENR-NCR for Urban Greening/Landscaping and shall inform the same one (1) day before the scheduled delivery of seedlings;</li>
                                        <li>Prior to the tree-cutting operation the replacement seedlings/plants shall be delivered at DENR-NCR Production Nursery located along 
                                            North Avenue, Quezon City. A Certification Fee of P50.00 shall be paid by the permittee for the Certificate of Compliance to be issued, 
                                            duly signed by the Chief, Conservation and Development Division, copy furnished the undersigned;</li>
                                    
                                        <?php if($withnatural == 1) : ?>
                                            <?php if($reco_type_dead == 1 && $reco_type_palm== 1 && $reco_type_prune == 0 && $reco_type_ball == 0 && $reco_type_cut == 0){?>
                                                
                                            <?php }else{?>

                                                <li>The permittee shall pay the forest charges for the naturally grown tree to be determined after the conduct of tree cutting pursuant 
                                                    to DENR Administrative Order No. 2021-11 known as the <b>“Guidelines in the Processing and Issuance of Permits for the Cutting, Removal 
                                                    and Relocation of Naturally Growing Trees”</b>;</li>
                                            <?php } ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <li>A billboard with a dimension of 4’ x 8’ shall be installed conspicuously within the area to inform the public that the <?php if($reco_type == 'CUTTING'){ echo 'cutting operation'; }else{ echo 'cutting and earth-balling operations'; }; ?> 
                                        thereat is covered with a permit issued by DENR.  Such notice of particulars shall indicate the name of the permittee and the purpose of 
                                        the activities to be undertaken. Likewise, the <?php echo  $wsub; ?>  concerned shall be furnished with a copy of the permit prior to the said operation;</li>
                                    <li>The permittee shall immediately coordinate with the Chief, Enforcement Division or the duly authorized representative with office address located at 
                                        DENR Production Nursery Compound, North Avenue, Diliman, Quezon City with Telephone No. <b>0920-973-0301 loc 4206</b> upon receipt of the permit for the 
                                        proper scheduling of the said <?php if($reco_type == 'CUTTING'){ echo 'operation'; }else{ echo 'operations'; }; ?> which is under the direct supervision of this Office;</li>
                                    <?php if($reco_type == 'CUTTINGBALLING') : ?>
                                        <li>The transplanting of earth-balled trees shall be the obligation of the permittee and shall be planted in an area within Metro Manila free from 
                                            further development in coordination with the Conservation and Development Division.  The permittee shall maintain and protect the transplanted 
                                            trees for a period of at least one (1) year. For every transplanted tree that will not survive within six (6) months, the permittee shall replace
                                                preferably indigenous tree species at a ratio of 1:100 as prescribed under DENR Memorandum Order No. 2012-02;</li>
                                        <li>The permittee shall install safeguard to the earth-balled tree as precaution from hazard(s)</li>
                                    <?php endif; ?>
                                    <?php if($application_edit['nr_ecc_condition'] != '') : ?>
                                    <li>In accordance with the issued Environmental Compliance Certificate (ECC), the permittee <?php echo $application_edit['nr_ecc_condition']; ?></li>
                                    <?php endif; ?>
                                    <?php if($application_edit['purpose'] == 'development' || $application_edit['purpose'] == 'both') : ?>
                                        <li>The permittee shall incorporate greening component immediately upon project completion and submit a report with pictures to this Office through the Conservation and Development Division;</li>
                                    <?php else : ?>
                                        <li>The permittee shall immediately conduct greening activities after completion of the <?php if($reco_type == 'CUTTING'){ echo 'cutting operation'; }else{ echo 'cutting and earth-balling operations'; }; ?>  and submit a report with pictures to this Office through the Conservation and Development Division;</li>
                                    <?php endif; ?>
                                    <li>The permittee shall secure the services of a firm/person(s) with appropriate expertise and experience to ensure the safety of lives and properties;</li>
                                    <li>Only chainsaw/s with Certificate of Registration from DENR shall be used in the conduct of the <?php if($reco_type == 'CUTTING'){ echo 'cutting operation'; }else{ echo 'cutting and earth-balling operations'; }; ?> ;</li>
                                    <li>The DENR shall not be held responsible for any untoward incident that might occur during the <?php if($reco_type == 'CUTTING'){ echo 'cutting operation'; }else{ echo 'cutting and earth-balling operations'; }; ?> . Issues that may arise from said activity shall be addressed directly and solely by the permittee;</li>
                                    <li>The permittee shall be required to undertake measures during and after the <?php if($reco_type == 'CUTTING'){ echo 'cutting operation'; }else{ echo 'cutting and earth-balling operations'; }; ?>  to mitigate the negative impacts of the said activity within the locality and on the environment;</li>
                                    <?php if($application_edit['within_subdivision'] == 'within' and $application_edit['within_property'] == 'within') : ?>  
                                        <li>The derivable wood materials to be recovered from the cut tree shall belong to the landowner. In case the wood materials will be transported by the permittee outside Metro Manila, the same shall be covered by transport documents issued by the DENR;</li>
                                    <?php elseif($application_edit['within_subdivision'] == 'outside' and $application_edit['within_property'] == 'within') : ?>
                                        <li>The derivable wood materials to be recovered from the cut tree shall belong to the landowner. In case the wood materials will be transported by the permittee outside Metro Manila, the same shall be covered by transport documents issued by the DENR;</li>
                                    <?php elseif($application_edit['within_subdivision'] == 'within' and $application_edit['within_property'] == 'outside') : ?>  
                                        <li>The derivable wood materials to be recovered from the cut tree shall belong to the <?php echo $application_edit['within_subdivision_others']; ?>. In case the wood materials will be transported by the permittee outside Metro Manila, the same shall be covered by transport documents issued by the DENR;</li>
                                    <?php elseif($application_edit['within_subdivision'] == 'outside' and $application_edit['within_property'] == 'outside') : ?>
                                        <li>The derivable wood materials to be recovered from the cut tree shall be bucked into at least 2 meters in
                                        length and shall be delivered to DENR-NCR for safekeeping and proper disposition;</li>  
                                    <?php endif; ?> 
                                    <li>If necessary, the permittee shall file an extension of the permit issued ten (10) days prior to its expiry date. Otherwise, he/she shall be required to apply for a new permit and submit another set of requirements;</li>
                                    <li>A terminal report with pictures shall be submitted to this Office after the expiration of this permit or upon completion of the <?php if($reco_type == 'CUTTING'){ echo 'cutting operation'; }else{ echo 'cutting and earth-balling operations'; }; ?> , whichever comes first;</li>
                                    <li>Violation of any of the above conditions shall be sufficient ground for the cancellation/revocation of this permit, without prejudice to the imposition of penalties of 
                                        imprisonment and/or fine, under Presidential Decree Nos. 705 as amended (Revised Forestry Code) and/or 953 (Requiring the Planting of Trees in Certain Places and Penalizing 
                                        Unauthorized Cutting) and/ or Republic Act No. 9175 (Chainsaw Act and their implementing rules and regulations); and </li>
                                    <li>This permit has a validity of <?php echo $validity; ?> days upon release hereof or upon completion of the <?php if($reco_type == 'CUTTING'){ echo 'cutting operation'; }else{ echo 'cutting and earth-balling operations'; }; ?> , whichever comes first.</li>
                                <?php elseif($reco_type == 'BALLING') : ?>  
                                    <li>A billboard with a dimension of 4’ x 8’ shall be installed conspicuously within the area to inform the public that the earth-balling 
                                        operation thereat is covered with a permit issued by DENR.  Such notice of particulars shall indicate the name of the permittee and the 
                                        purpose of the activities to be undertaken. Likewise, the <?php echo  $wsub; ?> concerned shall be furnished with a copy of the permit prior to the 
                                        said operation;</li>
                                    <li>The transplanting of earth-balled trees shall be the obligation of the permittee and shall be planted in an area within Metro Manila free from 
                                        further development in coordination with the Conservation and Development Division.  The permittee shall maintain and protect the transplanted 
                                        trees for a period of at least one (1) year. For every transplanted tree that will not survive within six (6) months, the permittee shall replace 
                                        preferably indigenous tree species at a ratio of 1:100 as prescribed under DENR Memorandum Order No. 2012-02;</li>
                                    <li>The permittee shall install safeguard to the earth-balled tree as precaution from hazard(s)</li>
                                    <li>The permittee shall immediately coordinate with the Chief, Conservation and Development Division or the duly authorized representative with office 
                                        address located at DENR-NCR, National Ecology Center, East Avenue, Quezon City with Telephone No. <b>0920-979-5920 loc 2413</b> upon receipt of the permit 
                                        for the proper scheduling of the said operation which is under the direct supervision of this Office;</li>
                                    <?php if($application_edit['nr_ecc_condition'] != '') : ?>
                                    <li>In accordance with the issued Environmental Compliance Certificate (ECC), the permittee <?php echo $application_edit['nr_ecc_condition']; ?></li>
                                    <?php endif; ?>
                                    <li>The permittee shall incorporate greening component immediately upon project completion and submit a report with pictures to this Office through the 
                                        Conservation and Development Division;</li>
                                    <li>The permittee shall secure the services of a firm/person(s) with appropriate expertise and experience to ensure the safety of lives and properties;</li>
                                    <li>Only chainsaw/s with Certificate of Registration from DENR shall be used in the conduct of the earth-balling operation;</li>
                                    <li>The DENR shall not be held responsible for any untoward incident that might occur during the earth-balling operation. Issues that may arise from said activity 
                                        shall be addressed directly and solely by the permittee;</li>
                                    <li>The permittee shall be required to undertake measures during and after the earth-balling operation to mitigate the negative impacts of the said activity 
                                        within the locality and on the environment;</li>
                                    <li>The branches/debris from earth-balled tree shall be disposed properly by the permittee;</li>
                                    <li>If necessary, the permittee shall file an extension of the permit issued ten (10) days prior to its expiry date. Otherwise, he/she shall be 
                                        required to apply for a new permit and submit another set of requirements;</li>
                                    <li>A terminal report with pictures shall be submitted to this Office after the expiration of this permit or upon completion of the earth-balling operation, whichever comes first;</li>
                                    <li>Violation of any of the above conditions shall be sufficient ground for the cancellation/revocation of this permit, without prejudice to the imposition 
                                        of penalties of imprisonment and/or fine, under Presidential Decree Nos. 705 as amended (Revised Forestry Code) and/or 953 (Requiring the Planting of 
                                        Trees in Certain Places and Penalizing Unauthorized Cutting) and/ or Republic Act No. 9175 (Chainsaw Act and their implementing rules and regulations); 
                                        and </li>
                                    <li>This permit has a validity of <?php echo $validity; ?> days upon release hereof or upon completion of the earth-balling operation, whichever comes first.</li>
                                <?php endif; ?>
                            </ol>
                        <?php endif;?>

                        <p>For strict compliance.</p>
                        <br><br>
                        
                        <div class='row'>
                            <div class='col-sm-6'>
                                <p>Recommending Approval:</p>
                                <div class='col-sm-12' style='font-weight: bold; text-align:center;'>
                                    <img src='<?php echo base_url()."assets/attachments/signatures/ard.png"; ?>' width='300' height='80' alt='signature'>
                                </div>
                                <div class='col-sm-12' style='font-weight: bold; text-align:center;'>
                                    ENGR. HENRY P. PACIS
                                </div>
                                <div class='col-sm-12' style='font-style: italic; text-align:center;'>
                                    OIC - Office of the Assistant Regional Director<br> for Technical Services
                                </div>
                            </div>

                            <div class='col-sm-6'>
                                <p>Approved by:</p>
                                <div class='col-sm-12' style='font-weight: bold; text-align:center;'>
                                    <img src='<?php echo base_url()."assets/attachments/signatures/red.png"; ?>' width='70' height='80' alt='signature'>
                                </div>
                                <div class='col-sm-12' style='font-weight: bold; text-align:center;'>
                                    ATTY. MICHAEL DRAKE P. MATIAS
                                </div>
                                <div class='col-sm-12' style='font-style: italic; text-align:center;'>
                                    OIC - Regional Executive Director<br> DENR - NCR
                                </div>
                            </div>

                             <!-- QR CODE IMAGE -->
                             <div class="col-sm-6" style='margin-top:2rem;'>
                                <img src='https://quickchart.io/qr?text=<?php echo base_url(); ?>view_approved/<?php echo base64_encode($application_edit['id']); ?>' width='150' height='150' alt='signature'></img>
                                <?php echo $application_edit['reference_no_new'];?>
                                
                                <p><img src='<?php echo base_url()."assets/"; ?>denr-logo.png' width='50' height='50'>
                                <span style="font-size: 7px;">DENR NATIONAL CAPITAL REGION</span></p>
                            </div>

                        </div>
                </div>
                </p>
            </div>

            

        </div>
    </div>

    <button style="margin: 2rem" type="button" onclick="printDiv('printableArea')" class="btn btn-success" value="" ><i class='fa-solid fa-print' id="print"></i> Print</button>

</div>

<script>
    $( document ).ready(function() {
        $('#loading').hide();
    });
    
    function printDiv(divName) {
        // let text = "Item will be removed from the inventory once the BOQ was printed\nClick OK to confirm?";
        let text = "Click OK to confirm print?";
        if (confirm(text) == true) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            document.title='Narrative Report'; 

            var css = `@page 
                        .treeClass{ white-space: nowrap;}  
                        table, th, td {
                        border: 1px solid black;
                        border-collapse: collapse;
                        margin-bottom: 1rem;
                        }`,
            // var css = '@media print {  * { margin-left: 100 !important; padding: 0 !important; }  #controls, .footer, .footerarea{ display: none; }  html, body { height:100%; overflow: hidden; background: #FFF; font-size: 9.5pt; } .template { width: auto; left:0; top:0; } img { width:80%; } li { margin: 0 0 10px 20px !important;}}',
            // var css = '@page { font-size: 8px; margin: 0px; } input {border:0;outline:0;} input:focus {outline:none!important;} .item{ width: 40px !important; white-space: nowrap;} .description{ width: 500px !important; white-space: nowrap;} .specs{ width: 500px !important; white-space: nowrap;} .qty{ width: 50px !important; white-space: nowrap;}',
               head = document.head || document.getElementsByTagName('head')[0],
                style = document.createElement('style');

            style.type = 'text/css';
            style.media = 'print';

            if (style.styleSheet){
            style.styleSheet.cssText = css;
            } else {
            style.appendChild(document.createTextNode(css));
            }

            head.appendChild(style);
            window.print();

            document.body.innerHTML = originalContents;
            location.reload();
        }

    }
    
        
    $( document ).ready(function() {
        var base_url = <?php echo json_encode(base_url()); ?>;
        var app_id = <?php echo $application_edit['id'];?>;
        var reference_no_new = $('#reference_no_new').val();

        $.ajax({
            data : {
                        app_id : app_id,
                        reference_no_new : reference_no_new,
                    }
            , type: "POST"
            , url: base_url + "Applicationcontroller/update_reference_no_new"
            , dataType: 'json'
            , crossOrigin: false
        });
    });
    
</script>