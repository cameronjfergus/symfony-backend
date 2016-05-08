<?php
/**
 * /src/App/Command/User/CreateCommand.php
 *
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
namespace App\Command\User;

// Application components
use App\Entity\UserGroup;

// Symfony components
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

// 3rd party components
use Matthias\SymfonyConsoleForm\Console\Helper\FormHelper;

/**
 * Class CreateUserGroupCommand
 *
 * @category    Console
 * @package     App\Command\User
 * @author      TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
class CreateUserGroupCommand extends Base
{
    /**
     * Name of the console command.
     *
     * @var string
     */
    protected $commandName = 'user:createGroup';

    /**
     * Description of the console command.
     *
     * @var string
     */
    protected $commandDescription = 'Create new user group to the database.';

    /**
     * Supported command line parameters.
     *
     * @var array
     */
    protected $commandParameters = [
        [
            'name'          => 'name',
            'description'   => 'Name of the user group',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Initialize common console command
        parent::execute($input, $output);

        /** @var FormHelper $formHelper */
        $formHelper = $this->getHelper('form');

        /** @var UserGroup $userGroup */
        $userGroup = $formHelper->interactUsingForm('App\Form\Console\UserGroup', $this->input, $this->output);

        // Store user
        $this->storeUserGroup($userGroup);

        // Uuh all done!
        $this->io->success('New user group created!');
    }
}
