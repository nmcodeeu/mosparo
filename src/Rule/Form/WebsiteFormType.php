<?php

namespace Mosparo\Rule\Form;

use Mosparo\Util\ChoicesUtil;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class WebsiteFormType extends AbstractRuleTypeFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $ruleType = $options['rule_type'];
        if ($ruleType === null) {
            return;
        }

        $choices = ChoicesUtil::buildChoices($ruleType->getSubtypes());
        $builder
            ->add('type', ChoiceType::class, ['choices' => $choices, 'attr' => ['readonly' => (count($choices) === 1), 'class' => 'form-select rule-item-type']])
            ->add('value', TextType::class, ['attr' => ['placeholder' => 'URL/Domain', 'class' => 'rule-item-value']])
            ->add('rating', NumberType::class, ['required' => false, 'attr' => ['placeholder' => 'Rating', 'class' => 'rule-item-rating']])
        ;
    }
}