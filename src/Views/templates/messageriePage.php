<?php
/* Page de messagerie*/
?>



<section class="messagerie-page">
    <div class="split-container">
        <div class="users-container">
            <h1>Messagerie</h1>
            <div class="item-user-list">
                <?php foreach ($listUsers as $user): ?>
                    <form method="post" action="index.php?action=showMessageByUserId">
                        <input type="hidden" name="user_id" value="<?=$user['id']?>">
                        <button type="submit" class="item-user-link <?= ($selectedUserId == $user['id']) ? 'active' : '' ?>">
                            <div class="item-user-container">
                                <div class="image-user-container">
                                    <img src="..<?= htmlspecialchars($user['picture'] ?: '/public/assets/profile-images/default-profile-image.png') ?>" alt="Photo de <?= htmlspecialchars($user['username']) ?>">
                                </div>
                                <div class="user-information">
                                    <div class="split-container-user">
                                        <div class="user-name-container">
                                            <h2><?= htmlspecialchars($user['username']) ?></h2>
                                        </div>
                                        <div class="time-container">
                                            <?php
                                            $lastMessageDate = strtotime($user['last_message_date']);
                                            $now = time();
                                            if (($now - $lastMessageDate) > 86400):
                                                echo htmlspecialchars(date('d.m', $lastMessageDate));
                                            else:
                                                echo htmlspecialchars(date('H:i', $lastMessageDate));
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                    <div class="intro-message-container">
                                        <p><?= htmlspecialchars($user['last_message_content']) ?></p>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="conversation-container">
            <?php if ($selectedUser):?>
            <div class="user-container">
                <div class="image-user">
                    <img src="../<?= htmlspecialchars($selectedUser->getPicture() ?: '/public/assets/profile-images/default-profile-image.png') ?>" alt="Photo de <?= htmlspecialchars($selectedUser->getUsername()) ?>">
                </div>
                <h2><?= htmlspecialchars($selectedUser->getUsername()) ?></h2>
            </div>
            <div class="messages-container">
                <?php foreach ($messages as $message):?>
                    <?php if ($message['sender_id'] == $_SESSION['user']['id']): ?>
                        <div class="item-message-sender">
                            <div class="container-datetime">
                                <p class="date-message"><?= htmlspecialchars(date('d.m', strtotime($message['time']))) ?></p>
                                <p class="hours-message"><?= htmlspecialchars(date('H:i', strtotime($message['time']))) ?></p>
                            </div>
                            <div class="container-main-content">
                                <p><?= htmlspecialchars($message['content']) ?></p>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="item-message-receiver">
                            <div class="container-datetime">
                                <div class="image-user-receiver">
                                    <img src="../<?= htmlspecialchars($selectedUser->getPicture() ?: '/public/assets/profile-images/default-profile-image.png') ?>" alt="Photo de <?= htmlspecialchars($selectedUser->getUsername()) ?>">
                                </div>
                                <p class="date-message"><?= htmlspecialchars(date('d.m', strtotime($message['time']))) ?></p>
                                <p class="hours-message"><?= htmlspecialchars(date('H:i', strtotime($message['time']))) ?></p>
                            </div>
                            <div class="container-main-content">
                                <p><?= htmlspecialchars($message['content']) ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <form class="input-button-container" method="post" action="index.php?action=sendMessage">
                <input name="content" type="text" placeholder="Tapez votre message ici">
                <input type="hidden" name="receiver_id" value="<?= htmlspecialchars($selectedUser->getId()) ?>">
                <button type="submit" >Envoyer</button>
            </form>
            <?php else: ?>
            <p>Sélectionnez un utilisateur pour commencer une conversation</p>
            <?php endif; ?>
        </div>
    </div>
</section>