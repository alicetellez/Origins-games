<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div style="max-width: 1000px; margin: 0 auto; padding: 20px;">
    <h2 style="font-size: 2rem; color: var(--yellow-accent); margin-bottom: 24px; text-align: center;">
        Carrito de Compras
    </h2>

    <?php if (!empty($carrito)): ?>
        <div style="background: var(--bg-card); border: 1px solid var(--border-card); border-radius: 16px; padding: 24px; overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.95rem;">
                <thead>
                    <tr style="border-bottom: 2px solid var(--border-card); color: var(--yellow-accent);">
                        <th style="padding: 12px;">Producto</th>
                        <th style="padding: 12px;">Precio</th>
                        <th style="padding: 12px;">Cantidad</th>
                        <th style="padding: 12px;">Subtotal</th>
                        <th style="padding: 12px; text-align: center;">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $totalGeneral = 0;
                    foreach ($carrito as $item): 
                        $subtotal = $item['precio'] * $item['cantidad'];
                        $totalGeneral += $subtotal;
                    ?>
                        <tr style="border-bottom: 1px solid rgba(255,255,255,0.05); color: var(--text-primary);">
                            <td style="padding: 12px; font-weight: bold;"><?= htmlspecialchars($item['nombre']) ?></td>
                            <td style="padding: 12px;">$<?= number_format($item['precio'], 0, ',', '.') ?> COP</td>
                            <td style="padding: 12px;"><?= $item['cantidad'] ?></td>
                            <td style="padding: 12px; color: var(--cyan-accent);">$<?= number_format($subtotal, 0, ',', '.') ?> COP</td>
                            <td style="padding: 12px; text-align: center;">
                                <form action="/origins_games/carrito/eliminar" method="POST" style="display: inline;">
                                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                    <button type="submit" style="background: #991b1b; color: #fff; border: none; padding: 6px 12px; border-radius: 6px; cursor: pointer; font-size: 0.8rem;">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 24px; border-top: 2px solid var(--border-card); padding-top: 16px;">
                <form action="/origins_games/carrito/vaciar" method="POST">
                    <button type="submit" style="background: #334155; color: #fff; border: none; padding: 8px 16px; border-radius: 6px; cursor: pointer;">
                        Vaciar Carrito
                    </button>
                </form>

                <div style="text-align: right;">
                    <h3 style="font-size: 1.3rem; color: var(--text-primary); margin-bottom: 12px;">
                        Total: <span style="color: var(--yellow-accent);">$<?= number_format($totalGeneral, 0, ',', '.') ?> COP</span>
                    </h3>
                    <a href="/origins_games/checkout" class="btn btn-primary" style="padding: 10px 20px; text-decoration: none; display: inline-block;">
                        Proceder al Pago
                    </a>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div style="text-align: center; padding: 40px; background: var(--bg-card); border-radius: 16px; border: 1px solid var(--border-card);">
            <p style="color: var(--text-secondary); font-size: 1.1rem; margin-bottom: 16px;">Tu carrito está vacío.</p>
            <a href="/origins_games/catalogo" class="btn btn-primary" style="text-decoration: none;">Ver Productos</a>
        </div>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>