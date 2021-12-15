<?php if ($num_registro > $registros) : ?>
    <?php if ($pagina == 1) : ?>
        <div style="text-align: center;">
            <a class="btn  pagina" href="" v-num="<?php echo ($pagina + 1); ?>" num-reg="<?php echo $registros; ?>"> <i class="fas fa-arrow-alt-circle-right fa-2x"></i></a>
        </div>
    <?php elseif ($pagina == $paginas) : ?>
        <div style="text-align: center;">
            <a class="btn  pagina" href="" v-num="<?php echo ($pagina - 1); ?>" num-reg="<?php echo $registros; ?>"> <i class="fas fa-arrow-alt-circle-left fa-2x"></i> </a>
        </div>
    <?php else : ?>
        <div style="text-align: center;">
            <a class="btn  pagina" href="" v-num="<?php echo ($pagina - 1); ?>" num-reg="<?php echo $registros; ?>"> <i class="fas fa-arrow-alt-circle-left fa-2x"></i> </a> &nbsp;
            <a class="btn  pagina" href="" v-num="<?php echo ($pagina + 1); ?>" num-reg="<?php echo $registros; ?>"> <i class="fas fa-arrow-alt-circle-right fa-2x"></i></a>
        </div>
    <?php endif ?>
<?php endif ?>