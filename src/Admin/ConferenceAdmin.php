<?php 

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

final class ConferenceAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->with('Content', ['class' => 'col-md-9'])
                ->add('city', TextType::class)
                ->add('year', TextType::class)
           ->end()
           ->with('Meta data', ['class' => 'col-md-3'])
                ->add('is_international', CheckboxType::class, [
                    'required' => false,
                ])
                ->add('slug', TextType::class)
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {
        $datagrid->add('city');
        $datagrid->add('year');
        $datagrid->add('slug');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list->add('id');
        $list->addIdentifier('city');
        $list->add('year');
        $list->add('is_international');
        $list->add('slug');
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show->add('city');
        $show->add('year');
        $show->add('is_international');
        $show->add('slug');
    }
}