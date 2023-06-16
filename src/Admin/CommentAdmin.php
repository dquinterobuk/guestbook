<?php 

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use App\Entity\Conference;
use Sonata\AdminBundle\Form\Type\ModelType;

final class CommentAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->with('Content', ['class' => 'col-md-9'])
                ->add('author', TextType::class)
                ->add('email', TextType::class)
                ->add('text', TextareaType::class)
                ->add('state', TextType::class)
                ->add('created_at', DateType::class, [
                    // renders it as a single text box
                    'widget' => 'single_text',
                    'attr' => ['class' => 'js-datepicker'],
                    'input'  => 'datetime_immutable',
                ])

            ->end()
            ->with('Meta data', ['class' => 'col-md-3'])
                ->add('conference', ModelType::class, [
                    'class' => Conference::class,
                    'property' => 'city',
                ])
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {
        $datagrid->add('author');
        $datagrid->add('email');
        $datagrid->add('state');
        $datagrid->add('text');
        $datagrid->add('conference');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('id')
            ->addIdentifier('author')
            ->add('email')
            ->add('photo_filename')
            ->add('text')
            ->add('state')
            ->add('conference')
        ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show->add('author');
        $show->add('email');
        $show->add('text');
        $show->add('state');
        $show->add('conference');
    }
}